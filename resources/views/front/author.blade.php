<x-layout>
	<x-navbar :categories="$categories"/>
	<section id="author" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
		<div id="title" class="flex items-center gap-[30px]">
			<h1 class="text-4xl leading-[45px] font-bold">Author News</h1>
			<h1 class="text-4xl leading-[45px] font-bold">/</h1>
			<div class="flex gap-3 items-center">
				<div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
					<img src="{{Storage::url($author->avatar)}}" alt="profile photo" />
				</div>
				<div class="flex flex-col">
					<p class="text-lg leading-[27px] font-semibold">{{$author->name}}</p>
					<span class="text-[#A3A6AE]">{{$author->occupation}}</span>
				</div>
			</div>
		</div>
		<div id="content-cards" class="grid grid-cols-3 gap-[30px]">
            @forelse ($author->news as $news)
                  <a href="details.html" class="card">
                    <div
                        class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
                        <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                            <div
                                class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
                                <p class="text-xs leading-[18px] font-bold uppercase">{{$news->category->name}}</p>
                            </div>
                            <img src="{{Storage::url($news->thumbnail)}}" alt="thumbnail photo"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="text-lg leading-[27px] font-bold line-clamp-2">{{$news->name}}</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
            @empty
                <h1>Data tidak ditemukan..</h1>
            @endforelse 
		</div>
	</section>
	<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
		<div class="flex flex-col gap-3 shrink-0 w-fit">
			@foreach ($ads_banner as $banner)
                <a href="{{$banner->link}}">
                    <div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
                        <img src="{{Storage::url($banner->thumbnail)}}" class="object-cover w-full h-full" alt="ads" />
                    </div>
                </a>
            @endforeach
			<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
						src="{{asset("assets/images/icons/message-question.svg")}}" alt="icon" /></a>
			</p>
		</div>
	</section>
</x-layout>