<?php
include('/home/fns24bangla/public_html/includes/config.php');
#Run this cron on every 1/2 hours 9th March 2021 
//Get videos from channel by YouTube Data API
	$API_key    = 'AIzaSyCny0StT1H8Qh7fACNqxUkhRQgpdMI4MH0'; //my API key
	$channelID  = 'UCjq4Z1AGTsuJqod-AtbTPuw'; //my channel ID
	$channelID  = 'UCeqsFQ1CbE46xOdeG8_S8Bg'; //fns channel ID
	$maxResults = 100;
//echo 'sssssssssssssssssssss';exit;
    $output=array();

	$video_list = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
 	if($video_list->items){
		//Delete All Videos
		$db->delete("delete from youtube_videos");	
		foreach ($video_list->items as $item) {
			//Embed video
			if (isset($item->id->videoId)) {
				
				$video_id=$item->id->videoId;
				$video_title=$item->snippet->title;
				$channelId=$item->snippet->channelId;
				$publishedAt=$item->snippet->publishedAt;
				$video_description=trunc_string($item->snippet->description, 200);
				$video_thumbnails_default=$item->snippet->thumbnails->default->url; //120x90
				$video_thumbnails_medium=$item->snippet->thumbnails->medium->url; //320x180
				$video_thumbnails_high=$item->snippet->thumbnails->high->url; //480x360
				$video_embeded= 'https://www.youtube.com/embed/'.$video_id;
				
				/*'<div class="">
						<iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
						<h2>'. $item->snippet->title .'</h2>
					</div>';*/
				
				$is_exist=$db->affected("select * from youtube_videos where video_id = '$video_id'");	
				if(!$is_exist){
					$data=array();	
					$data['video_id']=$video_id;	
					$data['video_title']=$video_title;	
					$data['channelId']=$channelId;	
					$data['publishedAt']=$publishedAt;	
					$data['video_description']=$video_description;	
					$data['video_thumbnails']=$video_thumbnails_default;	
					$data['video_embeded']=$video_embeded;	
					
					$id=$db->bindPOST('youtube_videos','id',$data);
					$output['new'][]=$video_id;
				}else{
					$output['exist'][]=$video_id;
				}
				
			
			}
		}
	}
	
		pre($output);
	
	
/*
stdClass Object
(
    [kind] => youtube#searchListResponse
    [etag] => cbT22JSJ8J1Gx7ZDeVAeEkSx8ds
    [nextPageToken] => CAoQAA
    [regionCode] => BD
    [pageInfo] => stdClass Object
        (
            [totalResults] => 16
            [resultsPerPage] => 10
        )

    [items] => Array
        (
            [0] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => Vc_9SXXRwo72lKKLbFhL6_2sctI
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => AP7ZRnG_Dcs
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2019-06-16T11:47:55Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => Aditya Kitchen Part 1
                            [description] => 
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/AP7ZRnG_Dcs/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/AP7ZRnG_Dcs/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/AP7ZRnG_Dcs/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2019-06-16T11:47:55Z
                        )

                )

            [1] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => XrbkgcVdzRj5sQcAcjuXepLZz0U
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => h0WujyX0-VM
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2019-06-16T11:48:40Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => Aditya Kitchen Part 2
                            [description] => 
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/h0WujyX0-VM/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/h0WujyX0-VM/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/h0WujyX0-VM/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2019-06-16T11:48:40Z
                        )

                )

            [2] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => X8byVZ3QWeW-FhbxxP79XIY7Ofc
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => KEpphNswmkc
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2019-06-16T11:29:08Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => Home Construction  June 2019
                            [description] => 
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/KEpphNswmkc/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/KEpphNswmkc/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/KEpphNswmkc/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2019-06-16T11:29:08Z
                        )

                )

            [3] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => 0h5PSlKwvKvevRTxNuVXgE-zSVo
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => UDKSkrMK19A
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2019-06-16T10:53:43Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => Playing with Frog
                            [description] => 
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/UDKSkrMK19A/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/UDKSkrMK19A/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/UDKSkrMK19A/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2019-06-16T10:53:43Z
                        )

                )

            [4] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => JSCmCvxZy_Zv42eM9PhM624TPds
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => ejLnsNjVCtA
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2018-11-08T15:23:47Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => Sourov Performing on Durga Puja 2018 @ Kulati High School
                            [description] => Kulati , Dumuria, Khulna.
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/ejLnsNjVCtA/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/ejLnsNjVCtA/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/ejLnsNjVCtA/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2018-11-08T15:23:47Z
                        )

                )

            [5] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => ew0jFf_dmLSWrt_srXfE9tzhujk
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => OIpA2pehYf8
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2018-10-17T12:24:45Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => Rupsha Bridge, Khulna, Bangladesh
                            [description] => 16th Oct, 2018.
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/OIpA2pehYf8/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/OIpA2pehYf8/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/OIpA2pehYf8/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2018-10-17T12:24:45Z
                        )

                )

            [6] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => Oh3tL2bTD1JaafYiXokQ1EQPjq8
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => 3GrXBQ7s55E
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2018-06-14T17:31:48Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => Satsang Bihar Joydebpur, Gazipur, Dhaka, Bangladesh
                            [description] => May 2018.
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/3GrXBQ7s55E/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/3GrXBQ7s55E/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/3GrXBQ7s55E/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2018-06-14T17:31:48Z
                        )

                )

            [7] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => tVnEI48rL9dQm77xToFRzYQDU8c
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => qeYU3H-bDWc
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2018-06-01T08:48:29Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => মহানন্দ বাবুর রামায়ণ গান
                            [description] => 
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/qeYU3H-bDWc/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/qeYU3H-bDWc/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/qeYU3H-bDWc/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2018-06-01T08:48:29Z
                        )

                )

            [8] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => oSkOT05NrHLqAURAGQ9uJ7Whs74
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => YfyhnSFlwqo
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2017-12-06T06:27:44Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => Human-Robot Sophia Talking with Prime Minister Sheck Hasina First time ever on Bangladesh
                            [description] => Audio after 52 sec Human-Robot Sophia Talking with Prime Minister Sheck Hasina First time ever on Bangladesh , Digital world 2017, Dhaka, Bangladesh.
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/YfyhnSFlwqo/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/YfyhnSFlwqo/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/YfyhnSFlwqo/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2017-12-06T06:27:44Z
                        )

                )

            [9] => stdClass Object
                (
                    [kind] => youtube#searchResult
                    [etag] => VjdNbeJbMGsfqQVdvAB7LeezXf0
                    [id] => stdClass Object
                        (
                            [kind] => youtube#video
                            [videoId] => NnyfF6JhNKw
                        )

                    [snippet] => stdClass Object
                        (
                            [publishedAt] => 2017-07-07T10:27:40Z
                            [channelId] => UCjq4Z1AGTsuJqod-AtbTPuw
                            [title] => How to use feather  in Adobe Photoshop (Bangla Tutorial)
                            [description] => 
                            [thumbnails] => stdClass Object
                                (
                                    [default] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/NnyfF6JhNKw/default.jpg
                                            [width] => 120
                                            [height] => 90
                                        )

                                    [medium] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/NnyfF6JhNKw/mqdefault.jpg
                                            [width] => 320
                                            [height] => 180
                                        )

                                    [high] => stdClass Object
                                        (
                                            [url] => https://i.ytimg.com/vi/NnyfF6JhNKw/hqdefault.jpg
                                            [width] => 480
                                            [height] => 360
                                        )

                                )

                            [channelTitle] => Bodhaditya Fouzder
                            [liveBroadcastContent] => none
                            [publishTime] => 2017-07-07T10:27:40Z
                        )

                )

        )

)

*/
?>