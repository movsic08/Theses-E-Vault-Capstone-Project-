<?php

namespace App\Livewire\Admin;

use App\Models\BachelorDegree;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AdminUsersPanel extends Component {

    public $currentListData, $currentQuery, $degreeLists;

    public function mount() {
        $this->currentListData = User::latest()
        ->get();
        $this->currentQuery = 'allUsers';
    }

    public function switchToVerifiedUsersData() {
        $this->currentListData = User::where( 'is_verified', 1 )->get();
        $this->currentQuery = 'verifiedUsers';
    }

    public function switchToAllUsersData() {
        $this->currentListData = User::latest()
        ->get();
        $this->currentQuery = 'allUsers';
    }

    public function switchToUnverifiedUsers() {
        $this->currentListData = User::where( 'is_verified', 0 )
        ->get();
        $this->currentQuery = 'unverifiedUsers';
    }

    public function switchToAdminUsers() {
        $this->currentListData = User::where( 'is_admin', 1 )
        ->get();
        $this->currentQuery = 'adminUsers';
    }

    public $newDepartmentBox = false;

    public function closeNewDepartmentBox() {
        $this->newDepartmentBox = false;
    }

    public function openNewDepartmentBox() {
        $this->newDepartmentBox = true;
    }

    #[ Rule( 'required|min:3' ) ]
    public $course_acronym = '';

    #[ Rule( 'required|min:3' ) ]
    public $degree_name = '';

    public  $idDepartment = '';

    public function addDepartment() {
        $this->validate();

        $createResult = BachelorDegree::create( [
            'degree_name' => strtoupper( $this->course_acronym ),
            'name' => $this->degree_name,
        ] );

        if ( $createResult ) {
            $this->reset( 'course_acronym', 'degree_name' );
            request()->session()->flash( 'success', 'New department added' );
        } else {
            $this->reset( 'course_acronym', 'degree_name' );
            request()->session()->flash( 'invalid', 'Adding not success.' );
        }

    }

    public $deleteDepartmentBox = false;

    public function closeDeleteDepartmentBox() {
        $this->deleteDepartmentBox = false;
    }

    public $idGathered, $nameGathered, $fullNameGathered;

    public function openDeleteDepartmentBox( $id, $fullName, $name ) {
        $this->idGathered = $id;
        $this->nameGathered = $fullName;
        $this->fullNameGathered = $name;
        $this->deleteDepartmentBox = true;
    }

    public function deleteDepartment( $id ) {
        $deleted = BachelorDegree::find( $id )->delete();
        if ( $deleted ) {
            request()->session()->flash( 'success', 'Department deleted' );
            $this->deleteDepartmentBox = false;
        } else {
            request()->session()->flash( 'error', 'Something went wrong, contact developer.' );
            $this->deleteDepartmentBox = false;
        }

    }

    public $editDepartmentBox = false;

    public $course_acronymEdit = '';

    public $degree_nameEdit = '';

    public function toggleEditDepartmentBox( $id, $acroynm, $fullname ) {
        $this->editDepartmentBox = !$this->editDepartmentBox;
        $this->idDepartment = $id;
        $this->course_acronymEdit = $acroynm;
        $this->degree_nameEdit = $fullname;
    }

    public function editDepartment() {
        $this->validate( [
            'course_acronymEdit' => 'required|min:3',
            'degree_nameEdit' => 'required|min:3',
        ] );
        $findId = BachelorDegree::find( $this->idDepartment );
        if ( $findId ) {
            $updteResult = $findId->update( [
                'degree_name' => $this->course_acronymEdit,
                'name' => $this->degree_nameEdit,
            ] );
            if ( $updteResult ) {
                request()->session()->flash( 'success', 'Editing success.' );
                $this->editDepartmentBox = false;
                $this->reset( 'course_acronymEdit', 'degree_nameEdit' );
            } else {
                request()->session()->flash( 'error', 'Editing success.' );
                $this->editDepartmentBox = false;
                $this->reset( 'course_acronymEdit', 'degree_nameEdit' );
            }

        } else {
            request()->session()->flash( 'error', 'Something went wrong in finding the field, contact developer.' );
            $this->editDepartmentBox = false;
            $this->reset( 'course_acronymEdit', 'degree_nameEdit' );
        }
    }
    public $currentListDataValue;

    public $rowMenuStates = [];

    public function toggleRowMenu( $rowId ) {
        if ( isset( $this->rowMenuStates[ $rowId ] ) ) {
            $this->rowMenuStates[ $rowId ] = !$this->rowMenuStates[ $rowId ];
        } else {
            $this->rowMenuStates[ $rowId ] = true;
        }
    }

    public $selectedUserId, $selectedUserEmail;
    public $showDeleteConfirmation = false;
    public $selectedData = '';

    public function showDeleteBoxUser( $userId ) {
        $user = User::find( $userId );

        if ( !$user ) {
            request()->session()->flash( 'error', 'User not found.' );
        } else {
            $this->selectedData = $user;
            $this->selectedUserId = $userId;
            $this->showDeleteConfirmation = true;
        }
    }

    public function closeRowMenu( $rowId ) {
        if ( isset( $this->rowMenuStates[ $rowId ] ) ) {
            $this->rowMenuStates[ $rowId ] = false;
        }
    }

    public function deleteUser() {
        // Find users by their IDs
        $users = User::find( $this->selectedData );

        // Check if any users were found
        if ( $users->isEmpty() ) {
            request()->session()->flash( 'error', 'No users found.' );
            $this->showDeleteConfirmation = true;
            return;
        }

        // Loop through the found users and delete them
        foreach ( $users as $user ) {
            $userDataToBeCheck = User::find( $user );
            return dd( $userDataToBeCheck );
            if ( $userDataToBeCheck->is_admin == 1 ) {
                request()->session()->flash( 'error', 'The use is admin, cannot proceed' );
                return;
            } else {
                $deleteResult = $user->delete() ;
                if ( $deleteResult ) {
                    request()->session()->flash( 'success', 'User deleted successfully.' );
                } else {
                    request()->session()->flash( 'error', 'Failed to delete the user. Please contact the developer.' );
                }
            }
        }

        $rowId = $this->selectedUserId;
        $this->closeRowMenu( $rowId );

        if ( $this->currentQuery == 'allUsers' ) {
            $this->currentQuery = $this->switchToAllUsersData();
            request()->session()->flash( 'success', 'all users' );
        } elseif ( $this->currentQuery == 'verifiedUsers' ) {
            $this->currentQuery = $this->switchToVerifiedUsersData();
            request()->session()->flash( 'success', 'all users' );
        } elseif ( $this->currentQuery == 'unverifiedUsers' ) {
            $this->currentQuery = $this->switchToUnverifiedUsers();
            request()->session()->flash( 'success', 'all users' );
        } elseif ( $this->currentQuery == 'adminUsers' ) {
            $this->currentQuery = $this->switchToAdminUsers();
            request()->session()->flash( 'success', 'all users' );
        } else {
            request()->session()->flash( 'success', 'esle block' );
        }

        $this->showDeleteConfirmation = false;

    }

    public function cancelDeleteBoxUser() {
        $this->showDeleteConfirmation = false;
        $rowId = $this->selectedUserId;
        $this->closeRowMenu( $rowId );
    }

    public $addUserButton = false;

    public function showAddUserBox() {
        $this->addUserButton = ! $this->addUserButton;
    }

    public $userLevel = 'user',
    $accountRole = 'student',
    $completeInfo = false;

    public function render() {
        $this->degreeLists = BachelorDegree::latest()
        ->get();
        return view( 'livewire.admin.admin-users-panel' )->layout( 'layout.admin' );
    }
}