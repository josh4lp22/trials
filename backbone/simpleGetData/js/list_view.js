var list_view = Backbone.View.extend({
    tagName: "tr",
    template: _.template($("#release_template").html()),
    render: function() {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },
});