document.addEventListener('alpine:init', () => {
    // Contact x-data
    Alpine.data('contact', () => ({
        id: null,
        full_name: null,
        setContactData(id, full_name) {
            this.id = id;
            this.full_name = full_name;
        }
    }));
})