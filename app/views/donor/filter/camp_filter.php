<!DOCTYPE html>

<head>
    <link href="../../../public/css/donor/dashboard.css" rel="stylesheet">

</head>

<body>

    </html>
    <div id="idfil01" class="modal">
        <span onclick="document.getElementById('idfil01').style.display='none'" class="close"
            title="Close Modal">×</span>
        <form class="modal-content" id="del" action="/getcampaign/type" method="POST">

            <div class="f-container">
                <h1>Filter & Short</h1>
                <div class="remove-filter">
                    <input name="all_type" type="checkbox" value="all">Remove all filters</input>
                </div>
                <div>
                    <div>
                        <p id="heading">
                            Select District
                        </p>
                        <!-- Only the date section in date format
            <input type="int" name="date" id="date" placeholder="Date" class="date"> -->
                        <!-- Only the month section in date format -->
                        <select id="month" name="district">
                            <option value="" disabled selected hidden>--Select District--</option>
                            <!-- all districs of sri lanka -->
                            <option value="Ampara">Ampara</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Batticaloa">Batticaloa</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Hambantota">Hambantota</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kegalle">Kegalle</option>
                            <option value="Kilinochchi">Kilinochchi</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Matale">Matale</option>
                            <option value="Matara">Matara</option>
                            <option value="Monaragala">Monaragala</option>
                            <option value="Mullaitivu">Mullaitivu</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Vavuniya">Vavuniya</option>
                        </select>

                    </div>
                    <div>
                        <p id="heading">
                            Select Month
                        </p>
                        <!-- Only the date section in date format
            <input type="int" name="date" id="date" placeholder="Date" class="date"> -->
                        <!-- Only the month section in date format -->
                        <select id="month" name="month">
                            <option value="" disabled selected hidden>--Select Month--</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>

                    </div>

                </div>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('idfil01').style.display='none'"
                        class="cancel">Cancel</button>
                    <button name="filter" type="submit"
                        onclick="document.getElementById('idfil01').style.display='none'" class="fil">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('idfil01');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>