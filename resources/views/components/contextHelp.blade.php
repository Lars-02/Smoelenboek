<button id="openButton" class="sm:text-sm md:text-base lg:text-lg pl-2 text-gray-600 hover:text-red-700 far fa-question-circle"></button>

<div id="popUp"
    class="fixed transform scale-0 transition-transform">

    <div class="p-5 bg-white border-2 border-black rounded-md"> 
        <span class="m:text-sm md:text-base lg:text-lg">
            {{$slot}}
        </span>
        <button id="closebutton" class="m:text-sm md:text-base lg:text-lg text-gray-600 hover:text-red-700 far fa-times-circle"></button>
    </div>
</div>


<script> 
    const button = document.getElementById('openButton')
    const closebutton = document.getElementById('closebutton')
    const PopUp = document.getElementById('popUp')

    button.addEventListener('click',()=>PopUp.classList.add('scale-100'))
    closebutton.addEventListener('click',()=>PopUp.classList.remove('scale-100'))
</script>