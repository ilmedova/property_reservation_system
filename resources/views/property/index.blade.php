@extends('layouts.user')

@section('content')
    <div class="flex flex-col md:flex-row h-screen">
        <!-- Map Section -->
        <div id="map" class="md:w-3/5 h-60 md:h-full fixed top-0 left-0 w-full md:relative"></div>

        <!-- List Section -->
        <div class="md:w-2/5 md:pl-4 md:ml-auto md:relative mt-60 md:mt-0 overflow-y-auto h-full">
            <div class="container mx-auto p-4">
                <form method="GET" action="{{ route('property.index') }}" class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="type_id" class="block text-sm font-medium text-gray-700">Room Type</label>
                            <select id="type_id" name="type_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">All Types</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="status_id" class="block text-sm font-medium text-gray-700">Room Status</label>
                            <select id="status_id" name="status_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">All Statuses</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ request('status_id') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full md:w-auto inline-flex items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Filter
                            </button>
                            <a href="{{ route('property.index') }}" class="w-full md:w-auto ml-2 inline-flex items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                Reset
                            </a>
                        </div>
                    </div>
                </form>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($rooms as $room)
                        <div>
                            <img class="h-64 w-full rounded-lg shadow-lg" style="background: url({{count($room->image) > 0 ? "/img/room/" . $room->number ."/". $room->image[0]->url : "https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"}}); background-size: 100%" alt="">
                            <div class="relative px-4 -mt-16">
                                <div class="p-6 bg-white rounded shadow-xl">
                                    <div class="flex items-baseline">
                                        <span class="inline-block {{$room->roomStatus->name == "Vacant" ? "bg-green-200 text-green-700" : "bg-blue-200 text-blue-800"}} text-xs px-2 rounded-full uppercase">
                                            {{$room->roomStatus->name}}
                                        </span>
                                        <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wider">
                                            capacity &bull; {{$room->capacity}}
                                        </div>
                                    </div>
                                    <h4 class="mt-1 font-semibold text-lg leading-tight truncate">
                                        {{$room->type->name}}
                                    </h4>
                                    <div class="mt-1">
                                        $ {{$room->price}}
                                        <span class="text-gray-600 text-sm"> / night</span>
                                    </div>
                                </div>
                                <!-- card -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="roomModal" class="fixed inset-0 hidden z-50 overflow-auto bg-gray-900 bg-opacity-50 flex items-center justify-center" style="z-index: 10000">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-auto">
            <div class="p-6 border-b flex items-center justify-between">
                <h3 id="modalRoomName" class="text-2xl font-bold text-gray-900"></h3>
                <button class="text-gray-400 hover:text-gray-600" onclick="closeModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <img id="modalRoomImage" class="w-full h-56 object-cover rounded-lg mb-4">
                <div class="space-y-2">
                    <p id="modalRoomType" class="text-lg text-gray-700"></p>
                    <p id="modalRoomStatus" class="text-lg text-gray-700"></p>
                    <p id="modalRoomPrice" class="text-lg text-gray-700"></p>
                </div>
                <div class="mt-6 flex justify-end">
                    <button class="px-6 py-2 text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById('roomModal').classList.add('hidden');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([41.8781, -87.6298], 10); // Center of Chicago

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add room markers
        @foreach($rooms as $room)
        var marker = L.marker([{{ $room->lat }}, {{ $room->lon }}]).addTo(map);
        marker.on('click', function() {
            openModal({{ $room->id }});
        });
        @endforeach

        // Open modal function
        function openModal(roomId) {
            // Fetch room details (This can be enhanced with AJAX for dynamic fetching)
            var room = @json($rooms).find(r => r.id == roomId);
            console.log(room)
            document.getElementById('modalRoomName').innerText = room.type.name;
            var image = 'https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
            if (room.image.length > 0){
                image = "/img/room/" + room.number + "/" + room.image[0].url
            }
            document.getElementById('modalRoomImage').src = image;
            document.getElementById('modalRoomType').innerText = 'Capacity: ' + room.capacity;
            document.getElementById('modalRoomStatus').innerText = 'Status: ' + room.room_status.name;
            document.getElementById('modalRoomPrice').innerText = '$' + room.price + ' / night';

            document.getElementById('roomModal').classList.remove('hidden');
        }

        // Close modal function
        function closeModal() {
            document.getElementById('roomModal').classList.add('hidden');
        }

        // Fix for null error on addEventListener
        document.querySelectorAll('.modal-close-button').forEach(button => {
            button.addEventListener('click', closeModal);
        });
    </script>
@endsection
