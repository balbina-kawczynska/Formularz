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
            range: [1, 147] /* przydaloby sie zeby nie mozna bylo wpisac innych wartosci - jakas blokada/limity(bo mozna wybierac strzalka wiek)? */
        }
    },
    messages: {
        name: {
            required: "This field is required", /* czemu sie blad nie czysci, po uzupelnieniu? */
            name: "Name not valid, name should have at least 2 characters" /* nie pokazuja sie te komunikaty */
        },
        message: {
            required: "This field is required", /* czemu sie blad nie czysci, po uzupelnieniu? */
            message: "Your message is too long, it should have maximum 1000 characters" /* nie pokazuja sie te komunikaty */
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