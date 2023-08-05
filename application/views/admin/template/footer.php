<script src="<?= base_url('assets/admin') ?>/js/core/popper.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/core/bootstrap.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets/admin') ?>/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
<script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector("input[name=tools]");

    // initialize Tagify on the above input node reference
    new Tagify(input, {
        originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(';')
    });
</script>
<script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector("#tools-edit");

    // initialize Tagify on the above input node reference
    new Tagify(input, {
        originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(';')
    });
</script>

<script type="text/javascript">
    $(function() {
        $(".btn-delete-portfolio").click(function() {
            var id = $(this).attr("id");
            var name = $(this).attr("name");

            $(".portfolio-name").text(name)
            $("#delete-portfolio-id").val(id);
            $("#modal-confirm").modal("show");
        });

        $("#delete-portfolio-confirm").click(function() {
            var portfolio_id = $("#delete-portfolio-id").val();

            $.ajax({
                url: "<?php echo site_url('portfolio/delete_portfolio'); ?>",
                type: "POST",
                data: "id=" + portfolio_id,
                cache: false,
                success: function(html) {
                    location.href = "<?php echo site_url('portfolio'); ?>";
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $(".btn-edit-portfolio").click(function() {
            var id = $(this).attr("data-id"),
                title = $(this).attr("data-title"),
                description = $(this).attr("data-description"),
                tools = $(this).attr("data-tools"),
                link = $(this).attr("data-link"),
                old_thumbnail = $(this).attr("data-old-thumbnail");

            $("input[name=edit-id]").val(id);
            $("input[name=edit-title]").val(title);
            $("input[name=edit-tools]").val(tools);
            $("input[name=edit-link]").val(link);
            $("input[name=old_thumbnail]").val(old_thumbnail);
            $("#portfolio-desc").text(description);
            $("#modal-edit").modal("show");
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $(".btn-delete-skills").click(function() {
            var id = $(this).attr("id");
            var name = $(this).attr("name");

            $(".skills-name").text(name)
            $("#delete-skills-id").val(id);
            $("#modal-confirm").modal("show");
        });

        $("#delete-skills-confirm").click(function() {
            var skills_id = $("#delete-skills-id").val();

            $.ajax({
                url: "<?php echo site_url('skills/delete_skills'); ?>",
                type: "POST",
                data: "id=" + skills_id,
                cache: false,
                success: function(html) {
                    location.href = "<?php echo site_url('skills'); ?>";
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $(".btn-edit-skills").click(function() {
            var id = $(this).attr("data-id"),
                name = $(this).attr("data-name"),
                old_thumbnail = $(this).attr("data-old-image");

            $("input[name=edit-id]").val(id);
            $("input[name=edit-name]").val(name);
            $("input[name=old_thumbnail]").val(old_thumbnail);
            $("#modal-edit").modal("show");
        });
    });
</script>
</body>

</html>