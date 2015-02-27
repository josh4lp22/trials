/**
 * 
 */
var release_view = Backbone.View.extend({
    el: $('body'),
    editTemplate: _.template($("#releaseEditTemplate").html()),
    els: {
        message: '#message',
        row: '.row',
        editContainer: ".edit-container",
        editupc: "#editupc",
        editrelease: "#editrelease",
        releasename_add: "#releasename_add",
        upc_add: "#upc_add",
        table_data: 'table#release',
        pagination: "#pagination"
    },
    events: {
        "click a.delete_release": "delete_release",
        "click a.edit_release": "edit_release",
        "click #editCancel": "cancel_edit",
        "click #editSave": "save_edited",
        "click #addrelease": "add_release_event",
        'click a#sortrelease_name': 'sort_release_name',
        'click a#sortrelease_id': 'sort_release_id',
        'click a.page_nav': 'page_nav'

    },
    initialize: function() {
        this.collection = new ReleaseCollection(releases);
        this.collection.fetch({});
        this.render();
        this.render_pagination();
    },
    render: function() {
        this.$el.find(this.els.row).remove();
        console.log(this.collection);
        var releases = this.collection.models;
        _.each(releases.slice(this.collection._current_top, (this.collection._current_top + this.collection._per_page)), function(data) {
            var TempJsonNode = data.toJSON();
            this.$el.find(this.els.table_data).append(new release_list_view({
                tagName: 'tr',
                id: 'release_' + TempJsonNode.release_id,
                model: data
            }).render().el);
        }, this);
        return this;
    },
    delete_release: function(e) {
        var deleted = this.get_target_release(e.target.id);
        var flag = confirm('Are you sure you want to delete Genre details?');
        if (flag) {
            this.collection.remove(deleted);
            this.destroy_release(deleted);
            this.render();
        }
    },
    get_target_release: function(target) {
        alert(target);
        console.log( this.collection);
        var release = this.collection.where({"release_id": target})[0];
        console.log( release);
        return false;
    },
    destroy_release: function(target) {
        var that = this;
        if (target.get('release_id') != 1) {
            target.set('id', target.get('release_id'));
        }
        target.destroy({
            success: function(status, data) {
            },
            error: function(model, xhr, options) {
            },
            wait: true
        });
    },
    edit_release: function(e) {
        var r = {"release_id": e.target.id};
        if (this.$el.find(this.els.editContainer).length > 0)
            this.cancel_edit();
        r.release_name = this.collection.where({release_id: r.release_id})[0].get("release_name");
        r.upc = this.collection.where({release_id: r.release_id})[0].get("upc");
        r.release_date = this.collection.where({release_id: r.release_id})[0].get("release_date");
        this.$el.find("#release_" + r.release_id).attr("class", "edit-container").html(this.editTemplate(r));
    },
    save_edited: function(e) {
        e.preventDefault();
        var edited = this.collection.where({release_id: this.$el.find(this.els.editContainer).attr('id').split('_')[1]})[0],
                newrelease = $(this.els.editrelease).val(),
                newupc = $(this.els.editupc).val(),
                newrelease_id = this.$el.find(this.els.editContainer).attr('id').split('_')[1];
        edited.set({id: this.$el.find(this.els.editContainer).attr('id').split('_')[1], release_name: $.trim(newrelease), upc: newupc, release_id: newrelease_id});
        this.save_release(edited);
        this.cancel_edit();
    },
    save_release: function(newRelease) {
        var that = this;
        newRelease.save(newRelease, {
            success: function(model, response, options) {
                //that.finish_save(newRelease,response);
                if (response != 1) {
                    newRelease.set("release_id", String(response));
                }
                that.render();
            },
            error: function(model, xhr, options) {
                xhr.fault = {"networkError": 'We\'re sorry, a network error occured when trying to save this genre.'};
            },
            wait: true
        });
    },
    finish_save: function(newRelease, response) {
        if (response != 1) {
            newRelease.set("release_id", String(response));
        }
        this.render();
    },
    cancel_edit: function() {
        this.$el.find(this.els.editContainer).remove();
        this.render();
    },
    add_release_event: function(e) {
        e.preventDefault();
        newReleaseName = $(this.els.releasename_add).val();
        newUpc = $(this.els.upc_add).val();
        var addedrelease = new Release_model({
            release_name: $.trim(newReleaseName),
            upc: $.trim(newUpc)
        });
        this.collection.add(addedrelease);
        this.save_release(addedrelease);
    },
    sort_release_name: function() {
        this.cancel_edit();
        if (this.collection._order_by == "release_name_ascending") {
            this.collection.order_by_release_name_descending();
        } else {
            this.collection.order_by_release_name_ascending();
        }
    },
    sort_release_id: function() {
        this.cancel_edit();
        if (this.collection._order_by == "release_id_ascending") {
            this.collection.order_by_release_id_descending();
        } else {
            this.collection.order_by_release_id_ascending();
        }
    },
//    working for pagination

    render_pagination: function() {
        var paginator = new Pagination_view({
            collection: this.collection
        });
        this.$el.find(this.els.pagination).append(paginator.render().el);
        console.log(paginator.render().el);
    },
    page_nav: function(e) {
        this.cancel_edit();
        var navVal = e.currentTarget.id - 1;
        this.collection._current_top = parseInt(this.collection._per_page) * parseInt(navVal);
        this.render();
    },
});