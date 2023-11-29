<?php

namespace App\Livewire\Admin\Components;

use App\Models\BachelorDegree;
use App\Models\DocuPostType;
use App\Models\SettingWatermark;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class SystemSetting extends Component
{
    use WithFileUploads;
    use WithPagination;

    #[Url()]
    public $tab = 'profile';
    public $first_name, $last_name, $phone_no, $staff_id, $username, $bio, $address, $email, $bachelor_degree_input = '';
    public $profile_picture;
    public function mount()
    {
        $user = auth()->user();
        $this->username = $user->username;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->phone_no = $user->phone_no;
        $this->staff_id = $user->staff_id;
        $this->username = $user->username;
        $this->bachelor_degree_input = $user->bachelor_degree;
        $this->bio = $user->bio;
        $this->address = $user->address;
        $this->email = $user->email;
    }
    public function switchTab($tab)
    {
        $this->tab = $tab;
        // $this->dispatch('popstate', $tab);
    }

    public function showProfileUpload()
    {
        $this->dispatch('open-dp');
    }
    public function changeProfile()
    {
        $user = auth()->user();
        if ($this->profile_picture) {
            $this->validate([
                'profile_picture' => 'image|max:4024',
            ]);
            $extension = $this->profile_picture->getClientOriginalExtension();
            $currentDate = date('MjY');
            $customFileName = $user->last_name . '-' . $user->first_name . $currentDate . '.' . $extension;
            // $imagePath = $this->profile_picture->storeAs( 'profile_pictures', $customFileName, 'public' );
            $imagePath = $this->profile_picture->storeAs('profile_pictures', $customFileName, 'public');
            Auth::user()->update(['profile_picture' => $imagePath]);

            // $this->dispatch('profilePictureUpdated');
            $user->refresh();
            request()->session()->flash('message', 'Profile picture changed successfully.');
        } else {
            request()->session()->flash('message', 'There is problem uploading your image, try again.');
        }

        return $this->dispatch('close-dp');
    }
    public function closeProfile()
    {
        $this->dispatch('close-dp', function () {
            $this->reset($this->profile_picture);
            // }
        });
    }
    public $current_password, $password, $password_confirmation;
    public function changePassword()
    {
        $this->validate(
            [
                'current_password' => 'required',
                'password' => ['required', 'min:8', 'confirmed', 'different:current_password'],
            ],
            [
                'password.confirmed' => 'Password is not match!',
            ]
        );

        $user = Auth::user();
        if (Hash::check($this->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($this->password),
            ]);
            session()->flash('message', 'Password changed successfully.');
        } else {
            session()->flash('message', 'Incorrect old password.');
        }
        $this->reset(['current_password', 'password', 'password_confirmation']);

    }



    // public function boot()
    // {
    //     $user = auth()->user();
    //     if ($user->first_name && $user->last_name) {
    //         // session()->flash('message', 'User details are incomplete, edit in setting now.');
    //         request()->session()->flash('success', 'Comment violation confirm success.');
    //     }
    // }
    public function editProfile()
    {

        $user = auth()->user();
        $this->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'phone_no' => ['required', 'min:11', 'max:11', 'regex:/^09\d{9}$/', ($this->phone_no == $user->phone_no) ? '' : 'unique:users,phone_no'],
            'staff_id' => ['required', 'min:2', 'regex:/^\d{2}-AC-\d{4}$/', ($this->staff_id == $user->staff_id) ? '' : 'unique:users,staff_id'],
            'username' => ['required', 'min:2'],
            'bio' => ['required', 'min:2'],
            'address' => ['required', 'min:5'],
            'bachelor_degree_input' => ['required'],
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ], [
            'bachelor_degree_input.required' => 'Please select your department',
            'staff_id.regex' => 'The Employee ID must be in the format "XX-AC-XXXX".',
            'phone_no.regex' => 'This phone number must start with "09" and have 11 digits.',
            'phone_no.unique' => 'This phone number has already been taken.',
            'staff_id.unique' => 'This staff ID has already been taken, if you think this is mistaken contact admin.',
        ]);


        $isUpdated = Auth::user()->update([
            'first_name' => ucfirst($this->first_name),
            'last_name' => ucfirst($this->last_name),
            'email' => $this->email,
            'bachelor_degree' => $this->bachelor_degree_input,
            'bio' => $this->bio,
            'phone_no' => $this->phone_no,
            'staff_id' => $this->staff_id,
            'username' => $this->username,
            'address' => $this->address,
        ]);

        if ($isUpdated) {
            return session()->flash('message', 'Edit profile success!');
        } else {
            return session()->flash('error', 'Cannot update information, contact developer.');
        }


    }
    public $confirmationInput;
    public function showdelBox()
    {
        $this->dispatch('open-dla');
    }
    public function deletemyAccount()
    {
        $adminUserCount = User::where('is_admin', 1)->count();
        if ($adminUserCount > 1) {
            Auth::user()->delete();
            return redirect()->route('login')->with('message', 'Your account deleted successfully.');
        } else {
            session()->flash('error', 'Deleting the admin account is not allowed as it is the only admin account.');
            return $this->dispatch('close-dla', function () {
                $this->reset('confirmationInput');

            });
        }
        // dd($adminUserCount);
    }
    public function closeDelBox()
    {
        $this->dispatch('close-dla', function () {
            $this->reset('confirmationInput');
        });
    }

    public function openAddNewDocumentType()
    {
        $this->dispatch('open-ndt');
    }
    public function cancelNewDocumentType()
    {
        $this->dispatch('close-ndt');
    }
    public $docuType = 'default', $bgColor = "#0A2647", $textColor = "#FFFFFF";

    public function returnDefaultValueDocuType()
    {
        $this->docuType = 'default';
        $this->bgColor = "#0A2647";
        $this->textColor = "#FFFFFF";
        $this->currentEditingDocuTypeId = '';
        $this->editingDocuType = false;
    }

    public function saveEditingDocuType()
    {
        $this->validate([
            'docuType' => 'required|not_in:default', // Replace 'not default value' with 'not_in:default'
            'bgColor' => 'required|regex:/#[a-fA-F0-9]{6}/', // Validate that bgColor is a valid hex color code
            'textColor' => 'required|regex:/#[a-fA-F0-9]{6}/', // Validate that textColor is a valid hex color code
        ], [
            'docuType.not_in' => 'Enter a new document type.'
        ]);
        $isUpdated = DocuPostType::where('id', $this->currentEditingDocuTypeId)->update([
            'document_type_name' => $this->docuType,
            'text_color' => $this->textColor,
            'bg_color' => $this->bgColor
        ]);

        if ($isUpdated) {
            session()->flash('success', 'Update success.');
            $this->returnDefaultValueDocuType();
            return $this->dispatch('close-ndt');
        } else {
            $this->dispatch('close-ndt');
            $this->returnDefaultValueDocuType();
            return session()->flash('error', 'Something went wrong in saving, contact developer.');
        }
    }

    public $currentEditingDocuTypeId;
    public function editDocuType($id)
    {
        $editingDataDocuType = DocuPostType::where('id', $id)->first();
        if ($editingDataDocuType) {
            $this->dispatch('open-ndt');
            $this->editingDocuType = true;
            $this->docuType = $editingDataDocuType->document_type_name;
            $this->bgColor = $editingDataDocuType->bg_color;
            $this->textColor = $editingDataDocuType->text_color;
            $this->currentEditingDocuTypeId = $editingDataDocuType->id;
        } else {
            return session()->flash('error', 'Retrieving data error, contact dev.');
        }
    }
    public function addDocumentType()
    {
        $this->validate([
            'docuType' => 'required|not_in:default', // Replace 'not default value' with 'not_in:default'
            'bgColor' => 'required|regex:/#[a-fA-F0-9]{6}/', // Validate that bgColor is a valid hex color code
            'textColor' => 'required|regex:/#[a-fA-F0-9]{6}/', // Validate that textColor is a valid hex color code
        ], [
            'docuType.not_in' => 'Enter a new document type.'
        ]);
        $isAdded = DocuPostType::create([
            'document_type_name' => $this->docuType,
            'text_color' => $this->textColor,
            'bg_color' => $this->bgColor
        ]);

        if ($isAdded) {
            session()->flash('success', 'Added successfully.');
            return $this->dispatch('close-ndt');
        } else {
            $this->dispatch('close-ndt');
            return session()->flash('error', 'Something went wrong, contact developer.');
        }

    }

    public function addWatermark()
    {
        $this->dispatch('open-wat');
    }

    public function closeAddWatermark()
    {

        $this->dispatch('close-wat');
        return $this->reset('image');
    }

    #[Rule('image|required')]
    public $image;

    public function addNewWatermark()
    {
        $this->validateOnly('image');

        if ($this->image) {
            // Get the original name of the uploaded file
            $originalName = $this->image->getClientOriginalName();

            // Extract the filename and extension
            $filename = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $this->image->getClientOriginalExtension();

            // Create a custom filename with a timestamp, for example
            $customFilename = $filename . '_' . time() . '.' . $extension;

            // Store the file with the custom filename
            $filePath = $this->image->storeAs('watermarks', $customFilename, 'public');

            // Check if the image is a PNG (assuming PNG is likely to have transparency)
            if (strtolower($extension) === 'png') {
                // Save additional information to your database if needed
                SettingWatermark::create([
                    'file_link' => $filePath,
                    'file_name' => $customFilename,
                    'is_set' => 0,
                ]);

                $this->closeAddWatermark();
                session()->flash('success', 'Save success.');
            } else {
                unlink(public_path('storage/' . $filePath));
                session()->flash('error', 'The image must be in PNG format to have a transparency background.');
            }
        }
    }

    public $selectedData;

    public function showDel($id)
    {
        $selectedData = SettingWatermark::where('id', $id)->first();
        if ($selectedData) {
            $this->selectedData = $selectedData;
        } else {
            return session()->flash('error', 'Error in retrieving data, contact devs.');
        }
        $this->dispatch('open-del');
    }
    public function closeDel()
    {
        $this->dispatch('close-del');
    }
    public function deleteWatermark($id)
    {
        $is_setCount = SettingWatermark::where('is_set', 1)->count();
        if ($is_setCount >= 1) {
            $getData = SettingWatermark::where('id', $id)->first();
            if ($getData->is_set != 1) {
                unlink(public_path('storage/' . $getData->file_link));
                $isDeleted = $getData->delete();
                if ($isDeleted) {
                    session()->flash('success', 'Watermark deleted.');
                } else {
                    session()->flash('error', 'Error deleting, contact dev.');
                }
            } else {
                session()->flash('error', 'Failed deleting, this is the current watermark of the system.');
            }
        } else {
            session()->flash('error', 'Failed, Your system need one selected watermark.');
        }

        $this->dispatch('close-del');
        return $this->selectedData = '';
    }

    public function setAsDefault($id)
    {
        SettingWatermark::where('id', '!=', $id)->update(['is_set' => 0]);

        // Set is_set to 1 for the selected id
        SettingWatermark::where('id', $id)->update(['is_set' => 1]);

        return session()->flash('success', 'New default watermark is selected.');
    }

    public $previewData = null;

    public function showPreview($id)
    {

        $previewData = SettingWatermark::where('id', $id)->first();
        if ($previewData) {
            $this->previewData = $previewData;
        } else {
            return session()->flash('error', 'Error in retrieving data, contact devs.');
        }
        $this->dispatch('open-prev');
    }

    public function closePrev()
    {
        $this->dispatch('close-prev');
        return $this->previewData = null;
    }

    public function placeholder()
    {
        return view('livewire.placeholder.setting-skeleton');
    }

    public $deletingDocuId, $docuTypeNameTemp;
    public function deleteDocuType($id)
    {

        $findData = DocuPostType::where('id', $id)->first();
        if ($findData) {
            $this->docuTypeNameTemp = $findData->document_type_name;

        } else {
            return session()->flash('error', 'Somethig went wrong in showing delete, contact dev.');
        }
        $this->deletingDocuId = $id;
        $this->dispatch('open-de');
    }

    public function closeDeleteDocuType()
    {
        $this->dispatch('close-de');
        $this->docuTypeNameTemp = '';
        $this->deletingDocuId = '';
    }

    public $editingDocuType = false;
    public function deleteDocuTypeConfirmed()
    {
        $isDeleted = DocuPostType::where('id', $this->deletingDocuId)->delete();
        if ($isDeleted) {
            $this->closeDeleteDocuType();
            return session()->flash('success', 'Delete success.');
        } else {
            return session()->flash('error', 'Somethig went wrong in deleting, contact dev.');
        }

    }

    public function render()
    {
        $currentWatermark = SettingWatermark::where('is_set', 1)->first();
        $watermarkList = SettingWatermark::latest()->paginate(5);
        $bachelor_degree_data = BachelorDegree::get();
        $documentTypes = DocuPostType::get();
        $user = auth()->user();
        return view('livewire.admin.components.system-setting', [
            'user' => $user,
            'watermarkList' => $watermarkList,
            'currentWatermark' => $currentWatermark,
            'bachelor_degree_data' => $bachelor_degree_data,
            'documentTypes' => $documentTypes
        ]);
    }
}
