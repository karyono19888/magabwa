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
                  <a href="{{route('front.details', $news->slug)}}" class="card">
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
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{$news->created_at->format('d M, Y')}}</p>
                        </div>
                    </div>
                </a>
            @empty
                <h1>Data tidak ditemukan..</h1>
            @endforelse 
		</div>
	</section>
	<x-ads-banner :ads_banner="$adsBanner"/>
</x-layout>