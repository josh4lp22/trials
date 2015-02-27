var release_view = Backbone.View.extend({
	el: $('body'),
	editTemplate: _.template($("#releaseEditTemplate").html()),
	els: {
		message: '#message',
		row: '.row',
        editContainer: ".edit-container",
        editupc: "#editupc",
        editrelease: "#editrelease",
		releasedate: "#release_date",
        releasename_add: "#releasename_add",
        upc_add: "#upc_add",
        table_data: 'table#release',
	},
	events: {
		"click a.edit_release": "edit_release",
		"click #editCancel": "cancel_edit",
		"click #editSave": "save_edited",
		"click #addrelease": "add_release_event",
		"click a.delete_release": "delete_release"
	},
	initialize: function() {
        this.collection = new release_collection();
        this.collection.fetch({ async: false});
        this.render();
    },
	render: function() {
		this.$el.find(this.els.row).remove();
        var releases = this.collection.models;
        _.each(this.collection.models, function(data) {
            var TempJsonNode = data;
            this.$el.find(this.els.table_data).append(new list_view({
                tagName: 'tr',
                id: 'release_' + TempJsonNode.attributes.release_id,
                model: data
            }).render().el);
        }, this);
        return this;
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
	cancel_edit: function() {
        this.$el.find(this.els.editContainer).remove();
        this.render();
    },
	save_edited: function(e) {
        e.preventDefault();
        var edited = this.collection.where({release_id: this.$el.find(this.els.editContainer).attr('id').split('_')[1]})[0],
                newrelease = $(this.els.editrelease).val(),
                newupc = $(this.els.editupc).val(),
				newreleasedate = $(this.els.releasedate).val(),
                newrelease_id = this.$el.find(this.els.editContainer).attr('id').split('_')[1];
        edited.set({id: this.$el.find(this.els.editContainer).attr('id').split('_')[1], release_name: $.trim(newrelease), upc: newupc, release_date: newreleasedate, release_id: newrelease_id});
        this.save_release(edited);
        this.cancel_edit();
    },
    save_release: function(newRelease) {
        var that = this;
        newRelease.save(newRelease, {
            success: function(model, response, options) {
                if (response != 1) {
                    newRelease.set("release_id", String(response));
                }
                that.render();
            },
            error: function(model, xhr, options) {
                xhr.fault = {"networkError": 'We\'re sorry, a network error occured when trying to save this release.'};
            },
            wait: true
        });
    },
	add_release_event: function(e) {
        e.preventDefault();
        newReleaseName = $(this.els.releasename_add).val();
        newUpc = $(this.els.upc_add).val();
        var addedrelease = new release_model({
            release_name: $.trim(newReleaseName),
            upc: $.trim(newUpc)
        });
        this.collection.add(addedrelease);
        this.save_release(addedrelease);
		this.render();
    },
	delete_release: function(e) {
        var deleted = this.get_target_release(e.target.id);
        var flag = confirm('Are you sure you want to delete the release?');
        if (flag) {
            this.collection.remove(deleted);
            this.destroy_release(deleted);
            this.render();
        }
    },
    get_target_release: function(target) {
        var release = this.collection.where({"release_id": target})[0];
        return release;
    },
    destroy_release: function(target) {
        var that = this;
        if (target.get('release_id') != 1) {
            target.set('id', target.get('release_id'));
        }
        target.destroy({
            success: function(status, data) { console.log("success");
            },
            error: function(model, xhr, options) { console.log("error");
				xhr.fault = {"networkError": 'We\'re sorry, a network error occured when trying to delete this release.'};
            },
            wait: true
        });
    }
});