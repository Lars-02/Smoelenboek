<div x-data="{ open: false }">
    <button id="openButton" type="button" @click="open = true" class="sm:text-sm md:text-base lg:text-lg pl-2 text-gray-600 hover:text-red-700 far fa-question-circle"></button>
    <div id="popUp" class="absolute fixed transform z-10" x-show="open" @click.away="open = false">
        <div class="relative p-5 bg-white border-2 border-black rounded-md"> 
            <button id="closebutton" type="button" @click="open = false" class=" absolute top-2 right-2 m:text-sm md:text-base lg:text-lg text-gray-600 hover:text-red-700 far fa-times-circle"></button>
            <span class="m:text-sm md:text-base lg:text-lg">
                {{$slot}}
            </span>
           
        </div>
    </div>
</div>