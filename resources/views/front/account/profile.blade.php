@extends('layouts.master')

@section('content')


<body>
    {{-- if ($customerAddress->isNotEmpty()) --}}
    @foreach ($customerAddress as $item)
    <h1 class="dash-head">User Dashboard :- {{ $item->firstname .' '. $item->lastname }}</h1>
    @endforeach
    {{-- @endif --}}

    <div class="dash-nav">
        <a href="#" onclick="showSection('orders')">Orders</a>
        <a href="#" onclick="showSection('downloads')">Uploaded Files</a>
        <!-- <a href="#" onclick="showSection('address')">Address</a> -->
        <!--<a href="#" onclick="showSection('account-details')">Account Details</a>-->
        <a href="#" onclick="showSection('logout')">Logout</a>
    </div>
    <div class="cont-dash">
        <div class="dashboard-content">
            <div id="orders" class="section">
                <h2>My Orders</h2>

                @if ($orders->isNotEmpty())
                @foreach ($orders as $item)
                <div class="order-item">
                    <h5>Order {{ $item->id }}</h5>
                    <p>Status: <strong>Processing</strong></p>
                    <p>Date: {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y')}}</p>
                    <p>Total: ${{ number_format($item->grand_total,2 )}}</p>
                </div>
                @endforeach
                   
                @endif
                   

            </div>
          <div id="downloads" class="section" style="display: none;">
    <h2>Uploaded Files</h2>
    <ul>
        @if($uploadedFiles)
        @foreach($uploadedFiles as $file)
            <li>
                <a href="{{ url('uploads/files/' . $file->filename) }}" download>{{ $file->filename }}</a>
            </li>
        @endforeach
        @endif
     
    </ul>
</div>

         <!-- <div id="address" class="section" style="display: none;">
    <h2>Address</h2>
    {{-- <p>Primary Address:</p> --}}
    @if ($customerAddress->isNotEmpty())
    @foreach ($customerAddress as $item)
    <ul>
        <li>Name: {{ $item->firstname .' '. $item->lastname }}</li>
        <li>City: {{ $item->address }}</li>
        {{-- <li>State: State</li>
        <li>ZIP Code: 12345</li>
        <li>Country: Country</li> --}}
    </ul>
    @endforeach
    @endif
   
    
</div> -->

<!--           <div id="account-details" class="section" style="display: none;">-->
<!--    <h2>Account Details</h2>-->
<!--    <p>Username: example_user</p>-->
<!--    <p>Email: example@example.com</p>-->
<!--    <p>Membership Level: Premium</p>-->
    <!-- Additional static account details go here -->
<!--</div>-->

            <div id="logout" class="section" style="display: none;">
    <h2>Logout</h2>
    <p>Are you sure you want to log out?</p>
    <button onclick="logout()">Logout</button>
</div>

<script>
    function logout() {
        // Assuming you're redirecting to the logout route
        window.location.href = "{{ route('account.logout') }}";
    }
</script>

        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            var sections = document.querySelectorAll('.section');
            sections.forEach(function(section) {
                section.style.display = 'none';
            });

            // Show the selected section
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>



@endsection