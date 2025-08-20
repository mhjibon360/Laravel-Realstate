<form action="{{ route('contact.agent.message') }}" method="post" class="default-form" id="myForm">
    @csrf
    @method('POST')
    <div class="form-group">
        <input type="text" name="name" placeholder="Your Name" class=" form-control">
    </div>
    <div class="form-group">
        <input type="email" name="email" placeholder="Email Address" class=" form-control">
    </div>
    <div class="form-group">
        <input type="tel" name="phone" placeholder="Phone" class=" form-control">
    </div>
    <div class="form-group">
        <textarea name="message" placeholder="Your Message" class=" form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="theme-btn btn-one">Send Message</button>
    </div>
</form>
@push('frontend_script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    message: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please enter youe name',
                    },
                    email: {
                        required: 'Please enter youe email',
                    },
                    phone: {
                        required: 'Please enter youe phone',
                    },
                    message: {
                        required: 'Please enter youe message',
                    },

                },
                errorElement: 'strong',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endpush
