<div>

    <button wire:click="switchTab(1)" class="m-3 bg-blue-400 p-2">Tab 1</button>
    <button wire:click="switchTab(2)" class="m-3 bg-blue-400 p-2">Tab 2</button>
    <button wire:click="switchTab(3)" class="m-3 bg-blue-400 p-2">Tab 3</button>
    <button wire:click="switchTab(4)" class="m-3 bg-blue-400 p-2">Tab 4</button>

    <div>
        <h1>Sample</h1>
        <button class="bg-blue-400 p-2" wire:click='up'>plus</button>
        <span>{{ $count }}</span>
        <button class="bg-blue-400 p-2" wire:click='down'>minus</button>
    </div>

    @if ($tab == 1)
        <div>
            <H2>I am tab 1</H2>
        </div>
    @endif
    @if ($tab == 2)
        <div>
            <H2>I am tab 2</H2>
        </div>
    @endif
    @if ($tab == 3)
        <div>
            <H2>I am tab 3</H2>
        </div>
    @endif
    @if ($tab == 4)
        <div>
            <H2>I am tab 4</H2>
        </div>
    @endif

</div>
