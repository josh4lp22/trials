/**
 * 
 */

var release_list_view = Backbone.View.extend({
    tagName: "tr",
    className: 'row',
    template: _.template($("#release-template").html()),
    render: function() {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },
});