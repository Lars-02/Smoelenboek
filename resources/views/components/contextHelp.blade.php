<div x-data="{ open: false }">
    <button id="openButton" @click="open = true" class="sm:text-sm md:text-base lg:text-lg pl-2 text-gray-600 hover:text-red-700 far fa-question-circle"></button>

    <div id="popUp"
        class="fixed transform"
        x-show="open"
        @click.away="open = false"
    >

        <div class="p-5 bg-white border-2 border-black rounded-md"> 
            <span class="m:text-sm md:text-base lg:text-lg">
                {{$slot}}
            </span>
            <button id="closebutton" @click="open = false" class="m:text-sm md:text-base lg:text-lg text-gray-600 hover:text-red-700 far fa-times-circle"></button>
        </div>
    </div>
</div>