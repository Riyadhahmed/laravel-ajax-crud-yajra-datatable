<div class="row">
    <div class="col-md-12 col-sm-12 table-responsive">
        <table id="view_details" class="table table-bordered table-hover">
            <tbody>
            <tr>
                <td class="subject"> First Name</td>
                <td> :</td>
                <td> {{ $contact->first_name }} </td>
            </tr>
            <tr>
                <td class="subject"> Last Name</td>
                <td> :</td>
                <td> {{ $contact->last_name }} </td>
            </tr>
            <tr>
                <td class="subject"> User Name</td>
                <td> :</td>
                <td> {{ $contact->username }} </td>
            </tr>
            <tr>
                <td class="subject"> Gender</td>
                <td> :</td>
                <td> {{ $contact->gender }} </td>
            </tr>
            <tr>
                <td class="subject"> Status</td>
                <td> :</td>
                <td> @php $status = $contact->status ? 'Active' : 'Inactive' ;  @endphp {{ $status }} </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>