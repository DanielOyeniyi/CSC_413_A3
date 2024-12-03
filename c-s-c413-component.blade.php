<div wire:poll.1s="refresh_variables" class="bg-gray-900 h-screen text-indigo-400">
    <div class="mx-auto h-screen grid grid-cols-5 p-10 gap-10">
        <div class="h-full grid gap-10">
            <div class="h-min rounded-lg bg-gray-800 ring-1 ring-white/15 p-10 flex gap-5 col-span-1 ">
                <div>
                    <h2 class="text-2xl font-semibold text-indigo-400">Interviewee:
                        <a class="hover:underline hover:text-indigo-200 cursor-pointer">John Doe</a>
                    </h2>
                    <h2 class=" font-semibold text-indigo-400">Pronouns: He/Him</h2>
                    <h2 class=" font-semibold text-indigo-400">Sex: Male</h2>
                    <h2 class="font-semibold text-indigo-400">Age: 29</h2>
                </div>
            </div>

            <div class="h-min rounded-lg bg-gray-800 ring-1  ring-white/15 p-10 flex gap-5 col-span-1 justify-center ">
                <div class="flex flex-col gap-2 justify-center items-center">
                    <x-filament::button color="primary" >
                        View Transcripts
                    </x-filament::button>
                    <x-filament::button color="primary" >
                        Export / Share
                    </x-filament::button>
                    <x-filament::button color="primary" >
                        Recommend Insights
                    </x-filament::button>
                </div>
            </div>
        </div>

        <div class="rounded-lg bg-gray-800 ring-1 ring-white/15 p-10 col-span-4 h-full flex gap-6">
            <!-- Video Feed -->
            <img class="w-[400px] flex-none rounded-2xl object-cover" src="{{asset('storage/photo-1506794778202-cad84cf45f1d.jpeg')}}" alt="">

            <!-- Stats and Truth/Lie Analysis -->
            <div class="flex flex-col justify-between w-full gap-2">
                <!-- Truth/Lie Indicator -->
                <div class="p-4 rounded-lg text-center text-white border-2   @if($data['truth'] == 'Truth')
                       bg-green-600 border-green-800
                @else
               bg-red-600 border-red-800

                @endif  ">

                     <div class="text-2xl font-bold uppercase">{{ $data['truth']}}</div>
                    <p class="text-sm text-gray-200 mt-2">Confidence: {{ $data['confidence'] }}%</p>
                </div>

                <!-- Stats -->
                <div class="bg-gray-700 p-4 rounded-lg">
                    <div class="text-teal-400 text-lg font-bold">Emotion: <span class="text-gray-300">{{ $data['emotion']  }}</span></div>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg">
                    <div class="text-teal-400 text-lg font-bold">Eye Dilation: <span class="text-gray-300">{{ $data['eye_dilation'] }}</span></div>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg">
                    <div class="text-teal-400 text-lg font-bold">Stress Level: <span class="text-gray-300">{{ $data['stress_level'] }}</span></div>
                </div>
            </div>
        </div>

        <div class=" rounded-lg bg-gray-800 ring-1 ring-white/15 p-10 col-span-3 h-full">
            <!-- Question Section -->
            <div class="mb-6">
                <div class="text-lg font-bold text-gray-300 mb-2">Question:</div>
                <div class="bg-gray-700 p-4 rounded-lg text-gray-100">{{ $data['question'] }}</div>
            </div>

            <!-- Answer Section -->
            <div>
                <div class="text-lg font-bold text-gray-300 mb-2">Answer:</div>
                <div class="bg-gray-700 p-4 rounded-lg text-gray-100">{{ $data['answer'] }}</div>
            </div>
        </div>

        <div class=" rounded-lg bg-gray-800 ring-1 ring-white/15 p-10 col-span-2 h-full">
            <!-- Stats Section -->
            <div>
                <div class="text-lg font-bold text-gray-300 mb-4">Real-Time Stats:</div>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Heart Rate -->
                    <div class="bg-gray-700 p-4 rounded-lg text-center">
                        <div class="text-teal-400 text-xl font-bold">{{ $data['heart_rate']  }} BPM</div>
                        <div class="text-gray-400 text-sm">Heart Rate</div>
                    </div>
                    <!-- Body Temperature -->
                    <div class="bg-gray-700 p-4 rounded-lg text-center">
                        <div class="text-teal-400 text-xl font-bold">{{ $data['body_temperature'] }}°F</div>
                        <div class="text-gray-400 text-sm">Body Temperature</div>
                    </div>
                    <!-- Body Language -->
                    <div class="bg-gray-700 p-4 rounded-lg text-center">
                        <div class="text-teal-400 text-xl font-bold">{{ $data['body_language']  }}</div>
                        <div class="text-gray-400 text-sm">Body Language</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
