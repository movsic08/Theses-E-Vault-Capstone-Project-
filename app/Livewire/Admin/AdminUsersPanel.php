<?php

namespace App\Livewire\Admin;

use App\Models\BachelorDegree;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

// #[ Lazy ]

class AdminUsersPanel extends Component
{

    // // public function placeholder() {
    // //     return view( 'livewire.placeholder.admin-users-skeleton' )->layout( 'layout.admin' );
    // // }

    // public $currentListData, $currentQuery, $degreeLists;

    // public function mount()
    // {

    // }




    // public $defaultData = null;



    // // public function switchToUnverifiedUsers() {
    // //     $this->currentQuery = 'unverifiedUsers';
    // //     return $this->currentListData = User::where( 'is_verified', 0 )
    // //     ->get();
    // // }

    // // public function switchToAdminUsers() {
    // //     $this->currentQuery = 'adminUsers';
    // //     return  $this->currentListData = User::where( 'is_admin', 1 )
    // //     ->get();
    // // }

    // public $newDepartmentBox = false;

    // public function closeNewDepartmentBox()
    // {
    //     $this->newDepartmentBox = false;
    // }

    // public function openNewDepartmentBox()
    // {
    //     $this->newDepartmentBox = true;
    // }

    // #[Rule('required|min:3')]
    // public $course_acronym = '';

    // #[Rule('required|min:3')]
    // public $degree_name = '';

    // public $idDepartment = '';

    // public function addDepartment()
    // {
    //     $this->validate();

    //     $createResult = BachelorDegree::create([
    //         'degree_name' => strtoupper($this->course_acronym),
    //         'name' => $this->degree_name,
    //     ]);

    //     if ($createResult) {
    //         $this->reset('course_acronym', 'degree_name');
    //         request()->session()->flash('success', 'New department added');
    //     } else {
    //         $this->reset('course_acronym', 'degree_name');
    //         request()->session()->flash('invalid', 'Adding not success.');
    //     }

    // }

    // public $deleteDepartmentBox = false;

    // public function closeDeleteDepartmentBox()
    // {
    //     $this->deleteDepartmentBox = false;
    // }

    // public $idGathered, $nameGathered, $fullNameGathered;

    // public function openDeleteDepartmentBox($id, $fullName, $name)
    // {
    //     $this->idGathered = $id;
    //     $this->nameGathered = $fullName;
    //     $this->fullNameGathered = $name;
    //     $this->deleteDepartmentBox = true;
    // }

    // public function deleteDepartment($id)
    // {
    //     $deleted = BachelorDegree::find($id)->delete();
    //     if ($deleted) {
    //         request()->session()->flash('success', 'Department deleted');
    //         $this->deleteDepartmentBox = false;
    //     } else {
    //         request()->session()->flash('error', 'Something went wrong, contact developer.');
    //         $this->deleteDepartmentBox = false;
    //     }

    // }

    // public $editDepartmentBox = false;

    // public $course_acronymEdit = '';

    // public $degree_nameEdit = '';

    // public function toggleEditDepartmentBox($id, $acroynm, $fullname)
    // {
    //     $this->editDepartmentBox = !$this->editDepartmentBox;
    //     $this->idDepartment = $id;
    //     $this->course_acronymEdit = $acroynm;
    //     $this->degree_nameEdit = $fullname;
    // }

    // public function editDepartment()
    // {
    //     $this->validate([
    //         'course_acronymEdit' => 'required|min:3',
    //         'degree_nameEdit' => 'required|min:3',
    //     ]);
    //     $findId = BachelorDegree::find($this->idDepartment);
    //     if ($findId) {
    //         $updteResult = $findId->update([
    //             'degree_name' => $this->course_acronymEdit,
    //             'name' => $this->degree_nameEdit,
    //         ]);
    //         if ($updteResult) {
    //             request()->session()->flash('success', 'Editing success.');
    //             $this->editDepartmentBox = false;
    //             $this->reset('course_acronymEdit', 'degree_nameEdit');
    //         } else {
    //             request()->session()->flash('error', 'Editing success.');
    //             $this->editDepartmentBox = false;
    //             $this->reset('course_acronymEdit', 'degree_nameEdit');
    //         }

    //     } else {
    //         request()->session()->flash('error', 'Something went wrong in finding the field, contact developer.');
    //         $this->editDepartmentBox = false;
    //         $this->reset('course_acronymEdit', 'degree_nameEdit');
    //     }
    // }
    // public $currentListDataValue;

    // public $rowMenuStates = [];

    // // public function toggleRowMenu( $rowId ) {
    // //     if ( isset( $this->rowMenuStates[ $rowId ] ) ) {
    // //         $this->rowMenuStates[ $rowId ] = !$this->rowMenuStates[ $rowId ];
    // //     } else {
    // //         $this->rowMenuStates[ $rowId ] = true;
    // //     }
    // // }

    // public $selectedUserId, $selectedUserEmail;
    // public $showDeleteConfirmation = false;
    // public $selectedData = '';
    // public function showDeleteBoxUser($id)
    // {
    //     $user = User::find($id);

    //     if (!$user) {
    //         request()->session()->flash('error', 'User not found.');
    //     } else {
    //         $this->selectedData = $user;
    //         $this->selectedUserId = $id;
    //         $this->showDeleteConfirmation = true;
    //     }
    // }


    // // public function showDeleteBoxUser( $userId ) {
    // //     $user = User::find( $userId );

    // //     if ( !$user ) {
    // //         request()->session()->flash( 'error', 'User not found.' );
    // //     } else {
    // //         $this->selectedData = $user;
    // //         $this->selectedUserId = $userId;
    // //         $this->showDeleteConfirmation = true;
    // //     }
    // // }

    // public function closeRowMenu($rowId)
    // {
    //     $this->showDeleteConfirmation = false;
    // }

    // public function deleteUser()
    // {
    //     // Find users by their IDs
    //     $users = User::find($this->selectedData);

    //     // Check if any users were found
    //     if ($users->isEmpty()) {
    //         request()->session()->flash('error', 'No users found.');
    //         $this->showDeleteConfirmation = true;
    //         return;
    //     }

    //     // Loop through the found users and delete them
    //     foreach ($users as $user) {
    //         $userDataToBeCheck = User::find($user);

    //         $deleteResult = $user->delete();
    //         if ($deleteResult) {
    //             request()->session()->flash('success', 'User deleted successfully.');
    //         } else {
    //             request()->session()->flash('error', 'Failed to delete the user. Please contact the developer.');
    //         }

    //     }

    //     $rowId = $this->selectedUserId;
    //     $this->closeRowMenu($rowId);

    //     $this->showDeleteConfirmation = false;
    //     $this->reset(['selectedData', 'selectedUserId']);

    //     if ($this->currentQuery == 'allUsers') {
    //         request()->session()->flash('success', 'all users');
    //         return $this->switchToAllUsersData();

    //     } elseif ($this->currentQuery == 'verifiedUsers') {
    //         request()->session()->flash('success', 'all users');
    //         return $this->switchToVerifiedUsersData();

    //     } elseif ($this->currentQuery == 'unverifiedUsers') {
    //         request()->session()->flash('success', 'all users');
    //         return $this->switchToUnverifiedUsers();

    //     } elseif ($this->currentQuery == 'adminUsers') {
    //         request()->session()->flash('success', 'all users');
    //         return $this->switchToAdminUsers();
    //     } else {
    //         request()->session()->flash('success', 'esle block');
    //     }

    // }

    // // public function cancelDeleteBoxUser() {
    // //     $this->showDeleteConfirmation = false;
    // //     $rowId = $this->selectedUserId;
    // //     $this->closeRowMenu( $rowId );
    // // }

    // public $addUserButton = false,
    // $accRole = '1';

    // public function showAddUserBox()
    // {
    //     $this->addUserButton = !$this->addUserButton;
    // }

    // public $userLevel = 'user',
    // $completeInfo = false;

    // #[Rule('required|min:5', as: 'username')]
    // public $usernameInput;
    // #[Rule('required|email|unique:users,email,', as: 'email')]
    // public $emailInput;
    // #[Rule('required|confirmed|min:8', as: 'password')]
    // public $password;

    // public $password_confirmation;

    // #[Rule('required|min:1', as: 'first name')]
    // public $fnameInput;
    // #[Rule('required|min:1', as: 'last name')]
    // public $lnameInput;
    // #[Rule('required|min:11|max:11', as: 'phone number')]
    // public $phoneNum;
    // #[Rule('required', 'regex:/^21-(a|A)(c|C)-\d{4}$/i', as: 'ID number')]
    // public $idNumber;
    // #[Rule('required', as: 'Bachelor degree')]
    // #[Rule('integer', message: 'Please select their degree course')]
    // public $degreeName = 'a';
    // #[Rule('required|min:5', as: 'address')]
    // public $addressInput;

    // protected $userRule1 = [
    //     'usernameInput' => 'required|min:5|unique:users,username',
    //     'emailInput' => 'required|email|unique:users,email,',
    //     'password' => 'required|min:8|confirmed',
    //     'accRole' => 'required',
    // ];

    // protected $userRule2 = [
    //     'fnameInput' => 'required|min:1',
    //     'lnameInput' => 'required|min:1',
    //     'phoneNum' => 'required|min:11|max:11|unique:users,phone_no',
    //     'idNumber' => ['required', 'regex:/^21-(a|A)(c|C)-\d{4}$/i'],
    //     'degreeName' => 'required|integer',
    //     'addressInput' => 'required|min:5',
    // ];
    // protected $customMessages = [
    //     'degreeName.integer' => 'Please select their degree course',
    // ];

    // public function resetFields()
    // {
    //     $this->usernameInput = null;
    //     $this->emailInput = null;
    //     $this->password = null;
    //     $this->password_confirmation = null;
    //     $this->fnameInput = null;
    //     $this->lnameInput = null;
    //     $this->phoneNum = null;
    //     $this->idNumber = null;
    //     $this->addressInput = null;
    // }

    // public function addNewUser()
    // {
    //     // dd( $this->accRole );
    //     // dd( $this->currentQuery );
    //     if (!$this->completeInfo) {
    //         $validatedData = $this->validate($this->userRule1);
    //         $userCreateCheck = User::create([
    //             'username' => $validatedData['usernameInput'],
    //             'email' => $validatedData['emailInput'],
    //             'password' => Hash::make($validatedData['password']),
    //             'role_id' => $validatedData['accRole'],
    //             'is_admin' => ($this->userLevel == 'admin') ? true : false,
    //         ]);
    //         if ($userCreateCheck) {
    //             session()->flash('success', 'Create success!');
    //             $this->dispatch('userCreated', $this->currentQuery);
    //         } else {
    //             session()->flash('invalid', 'Creating account, failed');
    //         }

    //     } elseif ($this->completeInfo) {
    //         $mergeRules = array_merge($this->userRule1, $this->userRule2, $this->customMessages);
    //         $validateDateCompleteInfo = $this->validate($mergeRules);

    //         $userCreateCheck = User::create([
    //             'username' => $validateDateCompleteInfo['usernameInput'],
    //             'email' => $validateDateCompleteInfo['emailInput'],
    //             'password' => Hash::make($validateDateCompleteInfo['password']),
    //             'role_id' => $validateDateCompleteInfo['accRole'],
    //             'first_name' => $validateDateCompleteInfo['fnameInput'],
    //             'last_name' => $validateDateCompleteInfo['lnameInput'],
    //             'phone_no' => $validateDateCompleteInfo['phoneNum'],
    //             'bachelor_degree' => $validateDateCompleteInfo['degreeName'],
    //             'address' => $validateDateCompleteInfo['addressInput'],
    //             'student_id' => ($this->accRole == 1) ? $validateDateCompleteInfo['idNumber'] : null,
    //             'staff_id' => ($this->accRole == 2) ? $validateDateCompleteInfo['idNumber'] : null,
    //             'is_verified' => ($this->userLevel == 'admin') ? true : false,
    //         ]);
    //         if ($userCreateCheck) {
    //             session()->flash('success', 'created');
    //             $this->dispatch('userCreated', $this->currentQuery);
    //         } else {
    //             session()->flash('invalid', 'Creatinon failed');
    //         }
    //     }
    //     $this->resetFields();
    //     $this->addUserButton = false;

    //     // $datatest =  $this->validate( $this->userRule1 );
    //     // dd( $datatest );
    // }

    // #[ On( 'user-created' ) ]
    // public function updateLists( $user = null ) {
    // }

    public function render()
    {
        // $this->degreeLists = BachelorDegree::latest()
        // ->get();
        // return view( 'livewire.admin.admin-users-panel' )->layout( 'layout.admin' );
    }

}