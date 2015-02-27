var ReleaseCollection = Backbone.Collection.extend({
    _current_top: 0, //current genre at the top of the table
    _order_by: "release_id_ascending",
    _per_page: 15, //# of genres to display per page
    model: Release_model,
    url: "http://localhost:81/trials/backboneCrud/?action=add",
    sorts: {
        release_name_ascending: "release_name_ascending",
        release_name_descending: "release_name_descending",
        release_id_ascending: "release_id_ascending",
        release_id_descending: "release_id_descending"
    },
    comparator: function(a, b) {
        switch (this._order_by) {
            case this.sorts.release_name_ascending:
                if (a.get('release_name').toLowerCase() < b.get('release_name').toLowerCase())
                    return -1; // before
                if (a.get('release_name').toLowerCase() > b.get('release_name').toLowerCase())
                    return 1; // after
                break;
            case this.sorts.release_name_descending:
                if (a.get('release_name').toLowerCase() > b.get('release_name').toLowerCase())
                    return -1; // before
                if (a.get('release_name').toLowerCase() < b.get('release_name').toLowerCase())
                    return 1; // after
                break;
            case this.sorts.release_id_ascending:
                if (a.get('release_id') < b.get('release_id'))
                    return -1; // before
                if (a.get('release_id') > b.get('release_id'))
                    return 1; // after
                break;
            case this.sorts.release_id_descending:
                if (a.get('release_id') > b.get('release_id'))
                    return -1; // before
                if (a.get('release_id') < b.get('release_id'))
                    return 1; // after
                break;
        }
    },
    order_by_release_name_ascending: function() {
        this._order_by = this.sorts.release_name_ascending;
        this.sort();
    },
    order_by_release_name_descending: function() {
        this._order_by = this.sorts.release_name_descending;
        this.sort();
    },
    order_by_release_id_ascending: function() {
        this._order_by = this.sorts.release_id_ascending;
        this.sort();
    },
    order_by_release_id_descending: function() {
        this._order_by = this.sorts.release_id_descending;
        this.sort();
    }
});