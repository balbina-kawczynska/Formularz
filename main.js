$("#contactForm").validate({
    errorClass: "text-error",
    rules: {
        name: {
            required: true,
            name: true
        },
        message: {
            required: true,
            message: true
        },
        email: {
            required: true,
            email: true
        },
        age: {
            required: true,
            range: [1, 147]
        }
    },
    messages: {
        name: {
            required: "This field is required",
            name: "Name not valid, name should have at least 2 characters"
        },
        message: {
            required: "This field is required",
            message: "Your message is too long, it should have maximum 1000 characters"
        },
        email: {
            required: "This field is required",
            email: "Please enter a valid e-mail address"
        },
        age: {
            required: "This field is required",
        }
    }
});
