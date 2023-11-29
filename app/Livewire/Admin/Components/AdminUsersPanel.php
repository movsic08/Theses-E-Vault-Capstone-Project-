<?php

namespace App\Livewire\Admin\Components;

use App\Models\BachelorDegree;
use App\Models\DocuPost;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminUsersPanel extends Component
{
    use WithPagination;
    use WithFileUploads;

    public function placeholder()
    {
        return view('livewire.placeholder.admin-users-skeleton');
    }

    public $currentQuery;

    public function mount()
    {

    }




    public $defaultData = null;



    // public function switchToUnverifiedUsers() {
    //     $this->currentQuery = 'unverifiedUsers';
    //     return $this->currentListData = User::where( 'is_verified', 0 )
    //     ->get();
    // }

    // public function switchToAdminUsers() {
    //     $this->currentQuery = 'adminUsers';
    //     return  $this->currentListData = User::where( 'is_admin', 1 )
    //     ->get();
    // }

    public $newDepartmentBox = false;

    public function closeNewDepartmentBox()
    {
        $this->newDepartmentBox = false;
    }

    public function openNewDepartmentBox()
    {
        $this->newDepartmentBox = true;
    }

    #[Rule('required|min:3')]
    public $course_acronym = '';

    #[Rule('required|min:3')]
    public $degree_name = '';

    public $idDepartment = '';

    public function addDepartment()
    {

        $this->validateOnly('course_acronym');
        $this->validateOnly('name');

        $createResult = BachelorDegree::create([
            'degree_name' => strtoupper($this->course_acronym),
            'name' => $this->degree_name,
        ]);

        if ($createResult) {
            $this->reset('course_acronym', 'degree_name');
            request()->session()->flash('success', 'New department added');
        } else {
            $this->reset('course_acronym', 'degree_name');
            request()->session()->flash('error', 'Adding not success.');
        }

    }

    public $deleteDepartmentBox = false;

    public function closeDeleteDepartmentBox()
    {
        $this->deleteDepartmentBox = false;
    }

    public $idGathered, $nameGathered, $fullNameGathered;

    public function openDeleteDepartmentBox($id, $fullName, $name)
    {
        $this->idGathered = $id;
        $this->nameGathered = $fullName;
        $this->fullNameGathered = $name;
        $this->deleteDepartmentBox = true;
    }

    public function deleteDepartment($id)
    {
        $deleted = BachelorDegree::find($id)->delete();
        if ($deleted) {
            request()->session()->flash('success', 'Department deleted');
            $this->deleteDepartmentBox = false;
        } else {
            request()->session()->flash('error', 'Something went wrong, contact developer.');
            $this->deleteDepartmentBox = false;
        }

    }

    public $editDepartmentBox = false;

    public $course_acronymEdit = '';

    public $degree_nameEdit = '';

    public function toggleEditDepartmentBox($id, $acroynm, $fullname)
    {
        $this->editDepartmentBox = !$this->editDepartmentBox;
        $this->idDepartment = $id;
        $this->course_acronymEdit = $acroynm;
        $this->degree_nameEdit = $fullname;
    }

    public function editDepartment()
    {
        $this->validate([
            'course_acronymEdit' => 'required|min:3',
            'degree_nameEdit' => 'required|min:3',
        ]);
        $findId = BachelorDegree::find($this->idDepartment);
        if ($findId) {
            $updteResult = $findId->update([
                'degree_name' => $this->course_acronymEdit,
                'name' => $this->degree_nameEdit,
            ]);
            if ($updteResult) {
                request()->session()->flash('success', 'Editing success.');
                $this->editDepartmentBox = false;
                $this->reset('course_acronymEdit', 'degree_nameEdit');
            } else {
                request()->session()->flash('error', 'Editing success.');
                $this->editDepartmentBox = false;
                $this->reset('course_acronymEdit', 'degree_nameEdit');
            }

        } else {
            request()->session()->flash('error', 'Something went wrong in finding the field, contact developer.');
            $this->editDepartmentBox = false;
            $this->reset('course_acronymEdit', 'degree_nameEdit');
        }
    }
    public $currentListDataValue;


    public $addUserButton = false,
    $accRole = '1';

    public function showAddUserBox()
    {
        $this->addUserButton = !$this->addUserButton;
    }

    public $userLevel = 'user',
    $completeInfo = false;

    #[Rule('required|min:5', as: 'username')]
    public $usernameInput;
    #[Rule('required|email|unique:users,email,', as: 'email')]
    public $emailInput;
    #[Rule('required|confirmed|min:8', as: 'password')]
    public $password;

    public $password_confirmation;

    #[Rule('required|min:1', as: 'first name')]
    public $fnameInput;
    #[Rule('required|min:1', as: 'last name')]
    public $lnameInput;
    #[Rule('required|min:11|max:11', as: 'phone number')]
    public $phoneNum;
    #[Rule('required', 'regex:/^21-(a|A)(c|C)-\d{4}$/i', as: 'ID number')]
    public $idNumber;
    #[Rule('required', as: 'Bachelor degree')]
    #[Rule('integer', message: 'Please select their degree course')]
    public $degreeName = 'a';
    #[Rule('required|min:5', as: 'address')]
    public $addressInput;

    protected $userRule1 = [
        'usernameInput' => 'required|min:5|unique:users,username',
        'emailInput' => 'required|email|unique:users,email,',
        'password' => 'required|min:8|confirmed',
        'accRole' => 'required',
    ];

    protected $userRule2 = [
        'fnameInput' => 'required|min:1',
        'lnameInput' => 'required|min:1',
        'phoneNum' => 'required|min:11|max:11|unique:users,phone_no',
        'idNumber' => ['required', 'regex:/^21-(a|A)(c|C)-\d{4}$/i'],
        'degreeName' => 'required|integer',
        'addressInput' => 'required|min:5',
    ];
    protected $customMessages = [
        'degreeName.integer' => 'Please select their degree course',
    ];

    public function resetFields()
    {
        $this->usernameInput = null;
        $this->emailInput = null;
        $this->password = null;
        $this->password_confirmation = null;
        $this->fnameInput = null;
        $this->lnameInput = null;
        $this->phoneNum = null;
        $this->idNumber = null;
        $this->addressInput = null;
    }

    public function addNewUser()
    {
        if (!$this->completeInfo) {
            $validatedData = $this->validate($this->userRule1);
            $userCreateCheck = User::create([
                'username' => $validatedData['usernameInput'],
                'email' => $validatedData['emailInput'],
                'password' => Hash::make($validatedData['password']),
                'role_id' => $validatedData['accRole'],
                'is_admin' => ($this->userLevel == 'admin') ? true : false,
            ]);
            if ($userCreateCheck) {
                session()->flash('success', 'Create success!');
                $this->dispatch('userCreated', $this->currentQuery);
            } else {
                session()->flash('error', 'Creating account, failed');
            }

        } elseif ($this->completeInfo) {
            $mergeRules = array_merge($this->userRule1, $this->userRule2, $this->customMessages);
            $validateDateCompleteInfo = $this->validate($mergeRules);

            $userCreateCheck = User::create([
                'username' => $validateDateCompleteInfo['usernameInput'],
                'email' => $validateDateCompleteInfo['emailInput'],
                'password' => Hash::make($validateDateCompleteInfo['password']),
                'role_id' => $validateDateCompleteInfo['accRole'],
                'first_name' => $validateDateCompleteInfo['fnameInput'],
                'last_name' => $validateDateCompleteInfo['lnameInput'],
                'phone_no' => $validateDateCompleteInfo['phoneNum'],
                'bachelor_degree' => $validateDateCompleteInfo['degreeName'],
                'address' => $validateDateCompleteInfo['addressInput'],
                'student_id' => ($this->accRole == 1) ? $validateDateCompleteInfo['idNumber'] : null,
                'staff_id' => ($this->accRole == 2) ? $validateDateCompleteInfo['idNumber'] : null,
                'is_verified' => ($this->userLevel == 'admin') ? true : false,
            ]);
            if ($userCreateCheck) {
                session()->flash('success', 'created');
                $this->dispatch('userCreated', $this->currentQuery);
            } else {
                session()->flash('error', 'Creatinon failed');
            }
        }
        $this->resetFields();
        $this->addUserButton = false;

        // $datatest =  $this->validate( $this->userRule1 );
        // dd( $datatest );
    }

    #[On('user-created')]
    public function updateLists($user = null)
    {
    }

    public $selectedUser;
    public function deleteUserConfirmation($id)
    {
        $selectedUserCheck = User::where('id', $id)->first();

        if ($selectedUserCheck == null) {
            return request()->session()->flash('error', 'The user not found, something went wrong.');
        } else {
            $this->selectedUser = $selectedUserCheck;
            return $this->dispatch('open-del');
        }

    }

    public function deleteUser($userID)
    {

        $userVerification = User::where('id', $userID)->first();
        $adminUserCount = User::where('is_admin', 1)->count();
        if (auth()->user()->is_admin == 1 && $userVerification->is_admin == 1 && $userVerification->id == auth()->user()->id) {
            $this->dispatch('close-del', );
            return request()->session()->flash('error', 'You cannot delete your own account, go to admin setting for your deletion.');
        } else {

            if ($userVerification->is_admin == 1) {
                if ($adminUserCount > 1) {
                    $userVerification->delete();
                    request()->session()->flash('success', 'User deleted successfully.');
                    return $this->dispatch('close-del');
                } else {
                    session()->flash('error', 'Deleting the admin account is not allowed as it is the only admin account.');
                    return $this->dispatch('close-del');
                }
            }

            $isDeleted = $userVerification->delete();

            if ($isDeleted) {
                request()->session()->flash('success', 'User deleted successfully.');
                $this->dispatch('close-del');
            } else {
                request()->session()->flash('error', 'The user is not deleted, contact Developers.');
                $this->dispatch('close-del');
            }
        }
        $this->selectedUser = '';
        return;
    }

    public $currentViewingUser;
    public function viewUser($userid)
    {
        $findUser = User::where('id', $userid)->first();
        if ($findUser) {
            $this->currentViewingUser = $findUser;
        } else {
            return request()->session()->flash('error', 'The user is not deleted, contact Developers.');
        }
        return $this->dispatch('open-usr');
    }

    public $editUserState = false, $profilePictureOption = false, $updatingUserID;


    public function toggleEdit($updatingUserID)
    {
        $this->updatingUserID = $user = User::where('id', $updatingUserID)->first();
        if ($user) {
            $this->update_studentID = $user->student_id;
            $this->update_fname = $user->first_name;
            $this->update_lname = $user->last_name;
            $this->update_email = $user->email;
            $this->update_username = $user->username;
            $this->update_phoneNum = $user->phone_no;
            $this->update_address = $user->address;
            $this->update_bio = $user->bio;
        } else {
            return request()->session()->flash('error', 'Cannot load this, user might not found. Contact Developer.');
        }
        $this->editUserState = true;
        $this->profilePictureOption = true;
    }
    public function toggleEditUser($updatingUserID)
    {
        $this->viewUser($updatingUserID);
        $this->toggleEdit($updatingUserID);
        return $this->dispatch('open-usr');
    }
    public function toggleEditClose()
    {
        $this->editUserState = false;
        $this->profilePictureOption = false;
    }


    public $paginate = 10, $accountRole = 'all', $use_level = "all", $search, $program = "all", $selectedDate;
    #[Rule('required', 'regex:/^21-(A)(C)-\d{4}$/i', as: 'ID number')]

    public $update_studentID;
    #[Rule('required', 'min:1', as: 'first name')]

    public $update_fname;
    #[Rule('required', 'min:1', as: 'last name')]

    public $update_lname;
    #[Rule('required|email', as: 'email')]

    public $update_email;
    #[Rule('required|unique:users,email,')]

    public $update_username;
    #[Rule('required|min:11|max:11', as: 'phone number')]

    public $update_phoneNum;
    #[Rule('required|min:5', as: 'address')]

    public $update_address;
    #[Rule('required|min:2', as: 'bio')]

    public $update_bio;

    public function updateUserInfo($userId)
    {
        $findUser = User::where('id', $userId)->first();
        if ($findUser) {
            $this->validateOnly('update_studentID');
            $this->validateOnly('update_fname');
            $this->validateOnly('update_lname');
            $this->validateOnly('update_email');
            $this->validateOnly('update_username');
            $this->validateOnly('update_phoneNum');
            $this->validateOnly('update_address');
            $this->validateOnly('update_bio');

            $isUpdated = $findUser->update([
                'first_name' => $this->update_fname,
                'last_name' => $this->update_lname,
                'email' => $this->update_email,
                'username' => $this->update_username,
                'student_id' => $this->update_studentID,
                'phone_no' => $this->update_phoneNum,
                'address' => $this->update_address,
                'bio' => $this->update_bio,
            ]);

            if ($isUpdated) {
                request()->session()->flash('success', 'User updated, success!');
            } else {
                return request()->session()->flash('error', 'Cannot update user, contact developer.');
            }

        } else {
            return request()->session()->flash('error', 'Cannot retrive user to edit. Contact Devs.');
        }
        $this->editUserState = false;
        $this->profilePictureOption = false;
        $this->dispatch('close-usr');
    }

    #[Rule('nullable|sometimes|file|image|max:1004', as: 'profile picture')]
    public $update_profile_picture;

    public function deleteProfilePic($filepath, $userID)
    {

        if (Storage::disk('public')->exists($filepath)) {
            // File exists, so delete it
            Storage::disk('public')->delete($filepath);
            // request()->session()->flash('success', 'Profile deleted successfully.');
            $userProfile = User::where('id', $userID)->first();
            if ($userProfile) {
                $userProfile->update(['profile_picture' => null]);
                request()->session()->flash('success', 'Profile deleted success.');
            } else {
                request()->session()->flash('error', 'Cannot delete picture Contact Devs.');
            }
        } else {
            request()->session()->flash('error', 'Cannot delete picture Contact Devs.');
        }
        return $this->profilePictureOption = false;
    }

    public $hasData;
    public function render()
    {
        // sleep(1);
        $degreeLists = BachelorDegree::latest()
            ->get();
        $currentListData = User::latest();
        // $currentListData = User::where('id', 7);
        $this->hasData = 1;

        if (isset($this->search)) {
            $currentListData = $currentListData->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->accountRole !== "all") {
            $currentListData = $currentListData->where('role_id', $this->accountRole);
        }
        // if ($this->accountRole == "admin") {
        //     $currentListData->where('is_admin', 1);
        // }
        if ($this->program != "all") {
            $currentListData = $currentListData->where('bachelor_degree', $this->program);
        }
        if ($this->selectedDate) {
            $currentListData = $currentListData->whereDate('created_at', $this->selectedDate);
        }

        $currentListData = $currentListData->paginate($this->paginate);


        return view('livewire.admin.components.admin-users-panel', [
            'degreeLists' => $degreeLists,
            'currentListData' => $currentListData,
        ]);
    }
}