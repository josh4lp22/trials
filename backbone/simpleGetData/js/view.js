var release_view = Backbone.View.extend({
	el: $('body'),
	els: {
		table_data: 'table#release'
	},
	initialize: function() {
        this.collection = new release_collection();
        this.collection.fetch({ async: false});
        this.render();
    },
	render: function() {
        var releases = this.collection.models;
        _.each(this.collection.models, function(data) {
            var TempJsonNode = data;
            this.$el.find(this.els.table_data).append(new list_view({
                tagName: 'tr',
                id: 'release_' + TempJsonNode.release_id,
                model: data
            }).render().el);
        }, this);
        return this;
    }
});