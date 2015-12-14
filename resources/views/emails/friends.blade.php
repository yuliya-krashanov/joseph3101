<body>

<section>
    <h3>There is a new member in Friends Club: </h3>
   <div>
        <p><strong>First Name: </strong>{{ $member->first_name }}</p>
        <p><strong>Last Name: </strong>{{ $member->last_name }}</p>
        <p><strong>Email: </strong>{{ $member->email }}</p>
        <p><strong>Mobile Phone: </strong>{{ $member->mobile_phone }}</p>
        <p><strong>Additional Phone: </strong>{{ $member->additional_phone }}</p>
        <p><strong>City: </strong>{{ $member->address_city }}</p>
        <p><strong>Street: </strong>{{ $member->address_street }}</p>
        <p><strong>Street Number: </strong>{{ $member->address_street_number }}</p>
        <p><strong>Home Number: </strong>{{ $member->address_home_number }}</p>
        <p><strong>Birth date : </strong>{{ $member->birth_date }}</p>
        <p><strong>Status : </strong>{{ $member->status }}</p>

        @if ($member->status == 'married')
            <p><strong>Partner First name : </strong>{{ $member->partner_first_name }}</p>
            <p><strong>Partner Last name : </strong>{{ $member->partner_last_name }}</p>
            <p><strong>Partner Birth date : </strong>{{ $member->partner_birth_date }}</p>
            <p><strong>Partner Mobile Phone : </strong>{{ $member->partner_mobile_phone }}</p>
            <p><strong>Partner Email : </strong>{{ $member->partner_email }}</p>
        @endif

        <p><strong>Accept sending to mail : </strong>{{ $member->send_to_mail  }}</p>
        <p><strong>Accept sending on mobile : </strong>{{ $member->send_to_mobile }}</p>

   </div>

</section>
</body>