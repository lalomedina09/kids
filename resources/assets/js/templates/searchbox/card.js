const searchbox_card = `
<a href="#" class="qd-searchbox-card list-group-item-action d-flex add-item" data-id="<%= id %>" data-name="<%= full_name %>">
    <div class="photo">
        <img src="<%= profile_photo_url %>" width="100%" height="100%" class="rounded-circle">
    </div>
    <div class="content">
        <p class="name"><%= full_name %></p>
        <p class="email"><%= email %></p>
    </div>
</a>
`;

export default searchbox_card;
