<div class="flex flex-col w-80 text-lg">
    <a class="w-full pt-1 pb-1" href={{ $hrefAccount }}><x-button class="w-full">Account</x-button></a>
    <a class="w-full pt-1 pb-1" href={{ $hrefAccount }}><x-button @click="{{ $clickAction }}" class="w-full">Minoren, Afdeling</br> en Expertises</x-button></a>
    <a class="w-full pt-1 pb-1" href={{ $hrefWorkHours }}><x-button class="w-full">Werkdagen</x-button></a>
    <a class="w-full pt-1 pb-1" href={{ $hrefDelete }}><x-button class="w-full">Verwijderen</x-button></a>
</div>
