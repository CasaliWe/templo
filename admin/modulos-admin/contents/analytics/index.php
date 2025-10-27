<style>
    #iframe-analytics{
        height: 640px;
    }
    @media(min-width:1500px) {
        #iframe-analytics{
            height: 800px;
        }
    }
    @media(max-width:992px) {
        #iframe-analytics{
            height: 450px;
        }
    }
</style>

<div id="iframe-analytics"><iframe src="<?= $base_url; ?>modulos-admin/contents/analytics/analytics/analytics.php" class="w-100 h-100"></iframe></div>