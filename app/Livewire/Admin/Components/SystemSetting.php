<?php

namespace App\Livewire\Admin\Components;

use App\Models\BachelorDegree;
use App\Models\SettingWatermark;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

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
            'staff_id.regex' => 'The staff ID must be in the format "XX-AC-XXXX".',
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

    public function render()
    {
        $currentWatermark = SettingWatermark::where('is_set', 1)->first();
        $watermarkList = SettingWatermark::latest()->paginate(5);
        $bachelor_degree_data = BachelorDegree::get();
        $user = auth()->user();
        return view('livewire.admin.components.system-setting', [
            'user' => $user,
            'watermarkList' => $watermarkList,
            'currentWatermark' => $currentWatermark,
            'bachelor_degree_data' => $bachelor_degree_data,
        ]);
    }
}
