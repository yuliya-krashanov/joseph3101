<body>

<section>
    <h3>There is a new message from client: </h3>
   <div>
        <p><strong>Name : </strong>{{ $contactForm->name }}</p>
        <p><strong>Email : </strong>{{ $contactForm->email }}</p>
        <p><strong>Phone : </strong>{{ $contactForm->phone }}</p>
        <p><strong>Message : </strong>{{ $contactForm->message }}</p>
   </div>

</section>
</body>