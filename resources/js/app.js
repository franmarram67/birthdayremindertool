document.addEventListener('alpine:init', () => {
    // Contact x-data
    Alpine.data('contact', () => ({
        id: null,
        full_name: null,
        email: null,
        phone_number: null,
        picture: null,
        birth_date: null,
        setDeleteContactIdAndFullName(id, full_name) {
            this.id = id;
            this.full_name = full_name;
        },
        setFullContactDataAndWireLoadIt(id, full_name, email, phone_number, picture, birth_date) {
            this.id = id;
            this.full_name = full_name;
            this.email = email;
            this.phone_number = phone_number;
            this.picture = picture;
            this.birth_date = birth_date;
        }
    }));
})