<?php

namespace App\Livewire\Admin;

use App\Models\BachelorDegree;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AdminUsersPanel extends Component {

    public $currentListData, $currentQuery, $degreeLists;

    public function mount() {
        $this->currentListData = User::get();
        $this->currentQuery = 'allUsers';
    }

    public function switchToVerifiedUsersData() {
        $this->currentListData = User::where( 'is_verified', 1 )->get();
        $this->currentQuery = 'verifiedUsers';
    }

    public function switchToAllUsersData() {
        $this->currentListData = User::get();
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

    public function render() {
        $this->degreeLists = BachelorDegree::latest()
        ->get();
        return view( 'livewire.admin.admin-users-panel' )->layout( 'layout.admin' );
    }
}