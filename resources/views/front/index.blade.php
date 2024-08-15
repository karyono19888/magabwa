<x-layout>
	<x-navbar :categories="$categories"/>
	<section id="Featured" class="mt-[30px]">
		<div class="main-carousel w-full">
			@forelse ($featured_articles as $featured)
				<div class="featured-news-card relative w-full h-[550px] flex shrink-0 overflow-hidden">
					<img src="{{Storage::url($featured->thumbnail)}}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
					<div class="card-detail max-w-[1130px] w-full mx-auto flex items-end justify-between pb-10 relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white">Featured</p>
							<a href="{{route('front.details',$featured->slug)}}" class="font-bold text-4xl leading-[45px] text-white two-lines hover:underline transition-all duration-300">{{Str::substr($featured->name, 0,60)}} {{ strlen($featured->name)> 60 ? '...':'' }}</a>
							<p class="text-white">{{$featured->created_at->format('M d, Y') .' • '. $featured->category->name }}  </p>
						</div>
						<div class="prevNextButtons flex items-center gap-4 mb-[60px]">
							<button class="button--previous appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
								<img src="{{asset("assets/images/icons/arrow.svg")}}" alt="arrow" />
							</button>
							<button class="button--next appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 rotate-180">
								<img src="{{asset("assets/images/icons/arrow.svg")}}" alt="arrow" />
							</button>
						</div>
					</div>
				</div>
			@empty
				<p>Data not found ..</p>					
			@endforelse
		</div>
	</section>

	<section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
		<div class="flex justify-between items-center">
			<h2 class="font-bold text-[26px] leading-[39px]">
				Latest Hot News <br />
				Good for Curiousity
			</h2>
			<p class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">UP TO DATE</p>
		</div>
		<div class="grid grid-cols-3 gap-[30px]">
			@forelse ($articles as $article)
				<a href="{{route('front.details', $article->slug)}}" class="card-news">
					<div class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">{{$article->category->name}}</p>
							<img src="{{Storage::url($article->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px] line-clamp-3">{{Str::substr($article->name, 0, 60)}} {{ strlen($article->name)> 60 ? '...':'' }}</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$article->created_at->format('M d, Y ')}}</p>
						</div>
					</div>
				</a>
			@empty
				<p>Data not found..</p>
			@endforelse

		</div>
	</section>

	<section id="Best-authors" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
		<div class="flex flex-col text-center gap-[14px] items-center">
			<p class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">BEST AUTHORS</p>
			<h2 class="font-bold text-[26px] leading-[39px]">
				Explore All Masterpieces <br />
				Written by People
			</h2>
		</div>
		<div class="grid grid-cols-6 gap-[30px]">
			@forelse ($authors as $author)
				<a href="{{route('front.author', $author->slug)}}" class="card-authors">
					<div class="rounded-[20px] border border-[#EEF0F7] p-[26px_20px] flex flex-col items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 rounded-full overflow-hidden">
							<img src="{{Storage::url($author->avatar)}}" class="object-cover w-full h-full" alt="{{$author->name}}" />
						</div>
						<div class="flex flex-col gap-1 text-center">
							<p class="font-semibold">{{Str::substr($author->name, 0, 10)}} {{ strlen($author->name)> 10 ? '...':'' }}</p>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$author->news->count()}} News</p>
						</div>
					</div>
				</a>
			@empty
				<p>Data not found..</p>
			@endforelse
		</div>
	</section>
	
	<x-ads-banner :ads_banner="$adsBanner"/>

	<section id="Latest-entertainment" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
		<div class="flex justify-between items-center">
			<h2 class="font-bold text-[26px] leading-[39px]">
				Latest For You <br />
				in Entertainment
			</h2>
			<a href="#" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore All</a>
		</div>
		<div class="flex justify-between items-center h-fit">
			@foreach ($entertaiment_article_featured as $item)
				<div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
					<img src="{{Storage::url($item->thumbnail)}}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white">{{$item->category->name}}</p>
							<a href="{{route('front.details',$item->slug)}}" class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{$item->name}}</a>
							<p class="text-white">{{$item->created_at->format('d M, Y')}}</p>
						</div>
					</div>
				</div>
			@endforeach

			<div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
				<div class="w-[455px] flex flex-col gap-5 shrink-0">
					@foreach ($entertaiment_article as $data)
						<a href="{{route('front.details',$data->slug)}}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
								<div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{storage::url($data->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
								</div>
								<div class="flex flex-col justify-center-center gap-[6px]">
									<h3 class="font-bold text-lg leading-[27px]">{{Str::substr($data->name, 0, 50)}} {{ strlen($data->name)> 50 ? '...':'' }}</h3>
									<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$data->created_at->format('d M, Y')}}</p>
								</div>
							</div>
						</a>
					@endforeach
				</div>
				<div class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
			</div>
		</div>
	</section>

	<section id="Latest-business" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
		<div class="flex justify-between items-center">
			<h2 class="font-bold text-[26px] leading-[39px]">
				Latest For You <br />
				in Business
			</h2>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore All</a>
		</div>
		<div class="flex justify-between items-center h-fit">
			@foreach ($entertaiment_article_featured as $item)
				<div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
					<img src="{{Storage::url($item->thumbnail)}}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white">{{$item->category->name}}</p>
							<a href="{{route('front.details',$data->slug)}}" class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{$item->name}}</a>
							<p class="text-white">{{$item->created_at->format('d M, Y')}}</p>
						</div>
					</div>
				</div>
			@endforeach
			<div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
				<div class="w-[455px] flex flex-col gap-5 shrink-0">
					@foreach ($entertaiment_article as $data)
						<a href="{{route('front.details',$data->slug)}}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
								<div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{storage::url($data->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
								</div>
								<div class="flex flex-col justify-center-center gap-[6px]">
									<h3 class="font-bold text-lg leading-[27px]">{{Str::substr($data->name, 0, 50)}} {{ strlen($data->name)> 50 ? '...':'' }}</h3>
									<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$data->created_at->format('d M, Y')}}</p>
								</div>
							</div>
						</a>
					@endforeach
				</div>
				<div class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
			</div>
		</div>
	</section>

	<section id="Latest-automotive" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
		<div class="flex justify-between items-center">
			<h2 class="font-bold text-[26px] leading-[39px]">
				Latest For You <br />
				in Automotive
			</h2>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore All</a>
		</div>
		<div class="flex justify-between items-center h-fit">
			@foreach ($entertaiment_article_featured as $item)
				<div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
					<img src="{{Storage::url($item->thumbnail)}}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white">{{$item->category->name}}</p>
							<a href="{{route('front.details',$data->slug)}}" class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{$item->name}}</a>
							<p class="text-white">{{$item->created_at->format('d M, Y')}}</p>
						</div>
					</div>
				</div>
			@endforeach
			<div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
				<div class="w-[455px] flex flex-col gap-5 shrink-0">
					@foreach ($entertaiment_article as $data)
						<a href="{{route('front.details',$data->slug)}}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
								<div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{storage::url($data->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
								</div>
								<div class="flex flex-col justify-center-center gap-[6px]">
									<h3 class="font-bold text-lg leading-[27px]">{{Str::substr($data->name, 0, 50)}} {{ strlen($data->name)> 50 ? '...':'' }}</h3>
									<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$data->created_at->format('d M, Y')}}</p>
								</div>
							</div>
						</a>
					@endforeach
				</div>
				<div class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
			</div>
		</div>
	</section>

</x-layout>
