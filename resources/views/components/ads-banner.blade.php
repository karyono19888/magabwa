<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
    <div class="flex flex-col gap-3 shrink-0 w-fit">
        @foreach ($adsBanner as $banner)
            <a href="{{$banner->link}}">
                <div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
                    <img src="{{Storage::url($banner->thumbnail)}}" class="object-cover w-full h-full" alt="ads" />
                </div>
            </a>
        @endforeach 
        <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
            Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img src="{{asset("assets/images/icons/message-question.svg")}}" alt="icon" /></a>
        </p>
    </div>
</section>