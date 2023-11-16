<div>
    <section class="container">
        <div class="mt-14 flex h-full flex-col items-center justify-center md:mt-[6rem] md:p-2">
            <img class="h-[5rem]" src="{{ asset('icons/logo.svg') }}" alt="logo">
            <h2
                class="mx-[2rem] mt-7 text-center text-lg font-extrabold text-primary-color dark:text-white md:text-2xl lg:mx-[10rem] lg:text-4xl">
                UNLOCKING
                ACADEMIC
                INSIGHTS:
                EXPLORE
                THE
                REALM OF
                RESEARCH
                WORKS,
                THESES, CAPSTONE, AND FEASIBILITY STUDIES</h2>
            <div class="mx-20 my-4 flex flex-col gap-2 md:gap-4">

                <div class="flex items-center justify-center" for="search-docu">
                    <input
                        class="h-8 w-[18rem] rounded-l-full border-b-2 border-l-2 border-t-2 px-4 font-medium drop-shadow-md focus:border-gray-400 focus:outline-none md:h-10 md:w-[27rem] lg:h-14 lg:w-[62.8rem]"
                        wire:keydown.enter='findResult' type="search" id="search-docu" wire:model.live='search'
                        placeholder="Search">
                    <button wire:click='findResult'
                        class="custom-blue-via flex h-[2rem] w-[2.5rem] items-center justify-center rounded-r-full p-2 drop-shadow-lg md:h-[2.4rem] md:w-[4rem] lg:h-14">
                        <svg wire:loading.remove wire:target='findResult' class="h-5"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43 37" fill="none">
                            <path
                                d="M18.1262 27.7507C21.184 27.7501 24.1537 26.834 26.5624 25.1483L34.1356 31.9255L36.5716 29.7456L28.9984 22.9684C30.8831 20.8126 31.9074 18.1544 31.9081 15.4173C31.9081 8.61703 25.7252 3.08398 18.1262 3.08398C10.5271 3.08398 4.34418 8.61703 4.34418 15.4173C4.34418 22.2176 10.5271 27.7507 18.1262 27.7507ZM18.1262 6.16732C23.8267 6.16732 28.4626 10.3159 28.4626 15.4173C28.4626 20.5187 23.8267 24.6673 18.1262 24.6673C12.4256 24.6673 7.78967 20.5187 7.78967 15.4173C7.78967 10.3159 12.4256 6.16732 18.1262 6.16732Z"
                                fill="white" />
                        </svg>
                        <div wire:loading wire:target='findResult'
                            class="inline-block h-5 w-5 animate-spin rounded-full border-4 border-solid border-white border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                            role="status">
                            <span
                                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                        </div>
                    </button>
                </div>

                <a href="{{ route('user-advanced-search') }}" wire:navigate
                    class="w-fit rounded-md bg-blue-500 px-2 py-1 text-xs text-white duration-200 ease-in-out hover:bg-blue-700 md:text-base">Advanced
                    search</a>
            </div>
            {{-- <div class="mt-2 w-full">
                <div
                    class="custom-scrollbar h-[20rem] space-y-2 overflow-y-auto rounded-3xl bg-white bg-opacity-50 p-2 drop-shadow-xl backdrop-blur-sm md:mx-[9.5rem] md:h-[28rem] md:w-[35rem] lg:h-fit lg:w-fit">
                    @foreach ($latestDocu as $item)
                        <div class="flex items-center pb-2">
                            <div class="flex items-center justify-center">
                                <svg class="mr-1 h-8 md:mr-3 md:h-12" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 46 46" fill="none">
                                    <path
                                        d="M17.3017 33.1758C17.6237 32.986 17.9764 32.802 18.3578 32.6276C18.0361 33.109 17.6907 33.574 17.3228 34.021C16.6788 34.7973 16.1786 35.2094 15.8623 35.3378C15.8362 35.3486 15.8093 35.3576 15.7818 35.3646C15.7589 35.3327 15.739 35.2987 15.7224 35.263C15.594 35.012 15.5978 34.7666 15.8144 34.437C16.0578 34.0575 16.5485 33.6224 17.3017 33.1758ZM22.9482 29.3885C22.6761 29.446 22.4039 29.5035 22.1298 29.5667C22.5362 28.7732 22.9195 27.9682 23.2798 27.1517C23.644 27.8264 24.035 28.4838 24.4528 29.1259C23.9545 29.1987 23.4504 29.2869 22.9482 29.3885ZM28.7557 31.5466C28.3985 31.2585 28.064 30.9432 27.7552 30.6036C28.2804 30.6151 28.7538 30.6554 29.164 30.7282C29.8923 30.8605 30.2354 31.0675 30.3542 31.2093C30.3926 31.2476 30.4137 31.3013 30.4156 31.3569C30.4074 31.5191 30.3601 31.677 30.2776 31.8169C30.2309 31.9284 30.1563 32.0261 30.061 32.1005C30.0134 32.1298 29.9573 32.142 29.9019 32.135C29.6949 32.1293 29.3077 31.9836 28.7557 31.5466ZM23.6382 20.6312C23.5462 21.1928 23.3891 21.8368 23.1782 22.5383C23.1008 22.2757 23.033 22.0104 22.9751 21.7429C22.7987 20.9302 22.7738 20.2939 22.8677 19.8511C22.9559 19.4448 23.1207 19.2819 23.3201 19.1995C23.4263 19.1534 23.5386 19.1231 23.6536 19.1094C23.7035 19.2556 23.7281 19.4092 23.7264 19.5636C23.7326 19.9222 23.703 20.2804 23.6382 20.6331V20.6312Z"
                                        fill="#BABABA" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.8 4.59961H25.9747C26.5845 4.60015 27.1691 4.84282 27.6 5.27428L36.1253 13.7996C36.3392 14.0132 36.5089 14.2669 36.6246 14.5461C36.7404 14.8253 36.8 15.1246 36.8 15.4269V36.7996C36.8 38.0196 36.3154 39.1896 35.4527 40.0523C34.59 40.915 33.42 41.3996 32.2 41.3996H13.8C12.58 41.3996 11.41 40.915 10.5473 40.0523C9.68465 39.1896 9.20001 38.0196 9.20001 36.7996V9.19961C9.20001 7.97961 9.68465 6.80959 10.5473 5.94692C11.41 5.08425 12.58 4.59961 13.8 4.59961ZM26.45 8.04961V12.6496C26.45 13.2596 26.6923 13.8446 27.1237 14.276C27.555 14.7073 28.14 14.9496 28.75 14.9496H33.35L26.45 8.04961ZM14.1795 36.0368C14.3865 36.4508 14.7085 36.8264 15.1858 37.0009C15.6231 37.1477 16.0999 37.123 16.5198 36.9319C17.2519 36.6329 17.9803 35.9294 18.6511 35.1244C19.4178 34.2006 20.2228 32.9912 20.999 31.6495C22.4996 31.2051 24.0363 30.8927 25.5913 30.7161C26.2813 31.5978 26.9943 32.3568 27.6843 32.9011C28.3283 33.4071 29.072 33.8288 29.8329 33.8594C30.2469 33.8805 30.6571 33.7713 31.0059 33.5432C31.3583 33.3032 31.6397 32.9729 31.8205 32.5868C32.0275 32.1709 32.154 31.7358 32.1368 31.2911C32.1219 30.8539 31.9598 30.4345 31.6768 30.1009C31.1593 29.4799 30.3063 29.1809 29.4688 29.0314C28.4532 28.874 27.4228 28.8354 26.3983 28.9164C25.5332 27.6935 24.7788 26.3958 24.1443 25.0389C24.7193 23.5209 25.1505 22.0854 25.3403 20.9124C25.4241 20.4464 25.4614 19.9732 25.4514 19.4998C25.4488 19.0704 25.3492 18.6471 25.1601 18.2616C25.0508 18.049 24.8955 17.8634 24.7055 17.7182C24.5156 17.573 24.2957 17.4718 24.0618 17.4221C23.598 17.3244 23.1188 17.4221 22.6818 17.6004C21.8136 17.9454 21.3555 18.6814 21.183 19.4921C21.0143 20.2741 21.091 21.1845 21.2884 22.1064C21.4916 23.0399 21.8366 24.0557 22.2774 25.0849C21.5713 26.8414 20.7557 28.5519 19.8356 30.2063C18.6498 30.5791 17.5069 31.0763 16.4258 31.6898C15.5748 32.1958 14.8178 32.7938 14.3635 33.4991C13.8805 34.2485 13.731 35.1417 14.1795 36.0368Z"
                                        fill="#BABABA" />
                                </svg>
                            </div>
                            <a wire:navigate href="{{ route('view-document', ['reference' => $item->reference]) }}"
                                class="text-sm md:text-base">
                                {{ $item->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>
    </section>

    <svg class="svg-bg -z-10 h-full w-full dark:bg-primary-color" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1600 900"
        preserveAspectRatio="xMidYMax slice">
        <defs>
            <linearGradient id="bg">
                <stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.244)"></stop>
                <stop offset="50%" style="stop-color:rgba(76, 189, 255, 0.456)"></stop>
                <stop offset="100%" style="stop-color:rgba(115, 209, 72, 0.337)"></stop>
            </linearGradient>
            <path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
 s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
        </defs>
        <g>
            <use xlink:href='#wave' opacity=".3">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="10s"
                    calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacity=".6">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                    calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacty=".9">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                    calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
        </g>
    </svg>

</div>
