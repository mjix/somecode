<?

function get_contents($page=1){
    $url = 'http://www.demohour.com/projects?page='.$page;
    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n".
                "User-Agent: Mozilla/5.0\r\n".
                "Referer: http://www.demohour.com/projects\r\n".
                "X-Requested-With: XMLHttpRequest\r\n"
        )
    );

    $ctx = stream_context_create($opts);
    $content = file_get_contents($url, false, $ctx);
    $content = strip_tags($content);

    $contents = explode('append("', $content);
    return $contents;
}

$page = 1;
$contents_page = array();
while(true){
    $conts = get_contents($page);
    if(count($conts)<2){
        break;
    }
    $page += 1;

    $contents_page[] = $conts;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>test</title>

<style type="text/css">
    table{border-collapse:collapse;}
    table th{background: #eee;}
    table td, table th{border:1px solid #ddd; line-height: 22px; padding: 3px 5px;}
</style>

</head>
<body>

<table border="0" cellpadding=0 cellspacing=1>
    <tr>
        <th>标题</th>
        <th>话题</th>
        <th>支持</th>
        <th>状态</th>
        <th>进度</th>
        <th>￥支持</th>
        <th>剩余时间</th>
    </tr>

    <?
    foreach ($contents_page as $k => $contents) {
        foreach ($contents as $kk => $info) {
            $info = str_replace('\n\n', '\n', $info);
            $info = str_replace('\n\n', '\n', $info);
            $list = explode('\n', $info);
    ?>
    <tr>
        <td><?=$list[1]; ?></td>
        <td><?=$list[2]; ?></td>
        <td><?=$list[3]; ?></td>
        <td><?=$list[4]; ?></td>
        <td><?=$list[6]; ?></td>
        <td><?=$list[7]; ?></td>
        <td><?=$list[8]; ?></td>
    </tr>

    <? }
        } ?>
</table>

<??>

<script type="text/javascript" src="http://pc2.gtimg.com/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    
</script>

</body>
</html>




