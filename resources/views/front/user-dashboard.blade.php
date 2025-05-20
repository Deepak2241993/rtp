@extends('layouts.master')

@section('content')


<body>
    <h1 class="dash-head">User Dashboard</h1>
    <div class="dash-nav">
        <a href="#" onclick="showSection('orders')">Orders</a>
        <a href="#" onclick="showSection('downloads')">Downloads</a>
        <a href="#" onclick="showSection('address')">Address</a>
        <a href="#" onclick="showSection('account-details')">Account Details</a>
        <a href="#" onclick="showSection('logout')">Logout</a>
    </div>
    <div class="cont-dash">
        <div class="dashboard-content">
            <div id="orders" class="section">
                <h2>My Orders</h2>
                <div class="order-item">
                    <h5>Order #123456</h5>
                    <p>Status: <strong>Processing</strong></p>
                    <p>Date: January 1, 2024</p>
                    <p>Total: $100.00</p>
                </div>
                <div class="order-item">
                    <h5>Order #789012</h5>
                    <p>Status: <strong>Completed</strong></p>
                    <p>Date: January 5, 2024</p>
                    <p>Total: $75.00</p>
                </div>
            </div>
          <div id="downloads" class="section" style="display: none;">
    <h2>Downloads</h2>
    <ul>
        <li><a href="download/file1.pdf">Download File 1</a></li>
        <li><a href="download/file2.zip">Download File 2</a></li>
        <li><a href="download/file3.docx">Download File 3</a></li>
    </ul>
</div>

         <div id="address" class="section" style="display: none;">
    <h2>Address</h2>
    <p>Primary Address:</p>
    <ul>
        <li>Street: 123 Main Street</li>
        <li>City: Anytown</li>
        <li>State: State</li>
        <li>ZIP Code: 12345</li>
        <li>Country: Country</li>
    </ul>
    <p>Additional Addresses:</p>
    <ul>
        <li>Street: 456 Elm Street</li>
        <li>City: Othertown</li>
        <li>State: State</li>
        <li>ZIP Code: 67890</li>
        <li>Country: Country</li>
    </ul>
</div>

           <div id="account-details" class="section" style="display: none;">
    <h2>Account Details</h2>
    <p>Username: example_user</p>
    <p>Email: example@example.com</p>
    <p>Membership Level: Premium</p>
    <!-- Additional static account details go here -->
</div>

            <div id="logout" class="section" style="display: none;">
    <h2>Logout</h2>
    <p>Are you sure you want to log out?</p>
    <button onclick="logout()">Logout</button>
</div>

<script>
    function logout() {
        // Perform logout actions here, such as clearing session data or redirecting to a logout page
        // For example, you might redirect the user to a login page after logging out
        window.location.href = "logout.php"; // Redirect to a logout script/page
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