document.addEventListener('alpine:init', () => {
    // Contact x-data
    Alpine.data('contact', () => ({
        id: null,
        full_name: null,
        email: null,
        phone_number: null,
        picture: null,
        birth_date: null,
        setContactData(id, full_name) {
            this.id = id;
            this.full_name = full_name;
        },
        loadContactData(id) {
            this.$wire.loadContactData(id);
            this.id = id;
            this.full_name = this.$wire.create_edit_contact_form.full_name;
            this.email = this.$wire.create_edit_contact_form.email;
            this.phone_number = this.$wire.create_edit_contact_form.phone_number;
            this.picture = this.$wire.create_edit_contact_form.picture;
            this.birth_date = this.$wire.create_edit_contact_form.birth_date;
        }
    }));
})