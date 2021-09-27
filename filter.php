<div class="container col-md-11">
        <label class="col-md-1 col-md-offset-3 text-right">Filter By: </label>
        <select id="filterCriteria" onchange="populateList()" class="input-sm text-primary col-md-2" style="margin-right:1%">
            <option value="" selected></option>
            <option value="City">City</option>
            <option value="Country">Country</option>
        </select>
        <select id="nameList" class="input-sm col-md-2 text-primary"  style="margin-right:1%" disabled></select>
        <input type="button" class="btn btn-warning btn-sm" onclick="filterResults()" value="Submit" />
</div>