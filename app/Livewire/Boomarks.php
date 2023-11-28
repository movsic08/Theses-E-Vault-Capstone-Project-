<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use App\Models\DocuPost;
use Livewire\Component;
use Livewire\Attributes\Js;

class Boomarks extends Component
{

    public $bookmarkLists, $documentLists;
    public $deletingItemId;
    public $confirmationBox = false;

    public function showConfirmation($title, $id)
    {
        $this->title = $title;
        $this->confirmationBox = true;
        $this->deletingItemId = $id;
        $this->dispatch('open-del');
    }

    public $title;
    public function removeFromList()
    {
        $doneDeleting = BookmarkList::where('user_id', auth()->id())
            ->where('id', $this->deletingItemId)
            ->delete();
        $this->closeConfirmationBox();
        if ($doneDeleting) {
            $this->confirmationBox = false;
            session()->flash('message', 'Removed success');
        } else {
            session()->flash('message', 'Something went wrong.');
        }

    }
    public $shareLink;

    public function messagesuc(){
        session()->flash('message', 'copy success');
    }
    #[Js]
    public function copyToClip()
    {
        return <<<'JS'
            const shareInput = document.getElementById('valueBox');
            try {
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(shareInput.value).then(() => {
                        console.log('Link copied to clipboard!');
                    }).catch((err) => {
                        console.error('Error copying to clipboard:', err);
                    });
                } else {
                    fallbackCopyTextToClipboard(shareInput.value);
                }
            } catch (err) {
                console.error('Error copying to clipboard:', err);
            }

            function fallbackCopyTextToClipboard(text) {
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();

                try {
                    document.execCommand('copy');
                    console.log('Link copied to clipboard using fallback method!');
                } catch (err) {
                    console.error('Error copying to clipboard:', err);
                }

                document.body.removeChild(textArea);
            }
        JS;
    }

    public function toggleShare($reference)
    {
        $this->shareLink = route('view-document', ['reference' => $reference]);
        $this->dispatch('open-shr');
    }

    public function closeConfirmationBox()
    {
        $this->dispatch('close-del', function () {
            $this->title = '';
        });

    }

    public function deleteAllBookmark()
    {
        $isDeleted = BookmarkList::where('user_id', auth()->id())->delete();
        if ($isDeleted) {
            return request()->session()->flash('success', 'Bookmarks deleted!');
        } else {
            return request()->session()->flash('error', 'Deleting failed, contact Devs.');

        }

    }
    public function render()
    {
        $this->bookmarkLists = BookmarkList::where('user_id', auth()->id())->get();
        $bookmarkItemCount = $this->bookmarkLists->count();
        // $this->documentLists = DocuPost::where( 'reference', $this->bookmarkLists->reference )
        // ->where( 'docu_post_id', $this->bookmarkLists->docu_post_id );
        // dd( $this->bookmarkLists );
        $references = $this->bookmarkLists->pluck('reference')->toArray();

        // Retrieve DocuPost data where the 'reference' matches any value in the $references array
        $this->documentLists = DocuPost::whereIn('reference', $references)->get();
        return view('livewire.boomarks', [
            'bookmarkItemCount' => $bookmarkItemCount,
        ])
            ->layout('layout.app');
    }
}