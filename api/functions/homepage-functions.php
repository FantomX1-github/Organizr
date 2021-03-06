<?php
//homepage order
function homepageOrder()
{
	$homepageOrder = array(
		"homepageOrdercustomhtml" => $GLOBALS['homepageOrdercustomhtml'],
		"homepageOrdercustomhtmlTwo" => $GLOBALS['homepageOrdercustomhtmlTwo'],
		"homepageOrdernzbget" => $GLOBALS['homepageOrdernzbget'],
		"homepageOrderjdownloader" => $GLOBALS['homepageOrderjdownloader'],
		"homepageOrdersabnzbd" => $GLOBALS['homepageOrdersabnzbd'],
		"homepageOrderplexnowplaying" => $GLOBALS['homepageOrderplexnowplaying'],
		"homepageOrderplexrecent" => $GLOBALS['homepageOrderplexrecent'],
		"homepageOrderplexplaylist" => $GLOBALS['homepageOrderplexplaylist'],
		"homepageOrderembynowplaying" => $GLOBALS['homepageOrderembynowplaying'],
		"homepageOrderembyrecent" => $GLOBALS['homepageOrderembyrecent'],
		"homepageOrderombi" => $GLOBALS['homepageOrderombi'],
		"homepageOrdercalendar" => $GLOBALS['homepageOrdercalendar'],
		"homepageOrdertransmission" => $GLOBALS['homepageOrdertransmission'],
		"homepageOrderqBittorrent" => $GLOBALS['homepageOrderqBittorrent'],
		"homepageOrderdeluge" => $GLOBALS['homepageOrderdeluge'],
		"homepageOrderrTorrent" => $GLOBALS['homepageOrderrTorrent'],
		"homepageOrderdownloader" => $GLOBALS['homepageOrderdownloader'],
		"homepageOrderhealthchecks" => $GLOBALS['homepageOrderhealthchecks'],
		"homepageOrderunifi" => $GLOBALS['homepageOrderunifi'],
		"homepageOrdertautulli" => $GLOBALS['homepageOrdertautulli'],
		"homepageOrderPihole" => $GLOBALS['homepageOrderPihole'],
		"homepageOrderMonitorr" => $GLOBALS['homepageOrderMonitorr'],
		"homepageOrderWeatherAndAir" => $GLOBALS['homepageOrderWeatherAndAir'],
		"homepageOrderSpeedtest" => $GLOBALS['homepageOrderSpeedtest'],
		"homepageOrderNetdata" => $GLOBALS['homepageOrderNetdata'],
	);
	asort($homepageOrder);
	return $homepageOrder;
}

function buildHomepage()
{
	$homepageOrder = homepageOrder();
	$homepageBuilt = '';
	foreach ($homepageOrder as $key => $value) {
		$homepageBuilt .= buildHomepageItem($key);
	}
	return $homepageBuilt;
}

function buildHomepageItem($homepageItem)
{
	$item = '<div id="' . $homepageItem . '">';
	switch ($homepageItem) {
		case 'homepageOrdercustomhtml':
			if ($GLOBALS['homepagCustomHTMLoneEnabled'] && qualifyRequest($GLOBALS['homepagCustomHTMLoneAuth'])) {
				$item .= ($GLOBALS['customHTMLone'] !== '') ? $GLOBALS['customHTMLone'] : '';
			}
			break;
		case 'homepageOrdercustomhtmlTwo':
			if ($GLOBALS['homepagCustomHTMLtwoEnabled'] && qualifyRequest($GLOBALS['homepagCustomHTMLtwoAuth'])) {
				$item .= ($GLOBALS['customHTMLtwo'] !== '') ? $GLOBALS['customHTMLtwo'] : '';
			}
			break;
		case 'homepageOrdernotice':
			break;
		case 'homepageOrdernoticeguest':
			break;
		case 'homepageOrderqBittorrent':
			if ($GLOBALS['homepageqBittorrentEnabled'] && qualifyRequest($GLOBALS['homepageqBittorrentAuth'])) {
				if ($GLOBALS['qBittorrentCombine']) {
					$item .= '
	                <script>
	                // homepageOrderqBittorrent
	                buildDownloaderCombined(\'qBittorrent\');
	                homepageDownloader("qBittorrent", "' . $GLOBALS['homepageDownloadRefresh'] . '");
	                // End homepageOrderqBittorrent
	                </script>
	                ';
				} else {
					$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
					$item .= '
	                <script>
	                // homepageOrderqBittorrent
	                $("#' . $homepageItem . '").html(buildDownloader("qBittorrent"));
	                homepageDownloader("qBittorrent", "' . $GLOBALS['homepageDownloadRefresh'] . '");
	                // End homepageOrderqBittorrent
	                </script>
	                ';
				}
			}
			break;
		case 'homepageOrderrTorrent':
			if ($GLOBALS['homepagerTorrentEnabled'] && qualifyRequest($GLOBALS['homepagerTorrentAuth'])) {
				if ($GLOBALS['rTorrentCombine']) {
					$item .= '
	                <script>
	                // homepageOrderrTorrent
	                buildDownloaderCombined(\'rTorrent\');
	                homepageDownloader("rTorrent", "' . $GLOBALS['homepageDownloadRefresh'] . '");
	                // End homepageOrderrTorrent
	                </script>
	                ';
				} else {
					$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
					$item .= '
	                <script>
	                // homepageOrderrTorrent
	                $("#' . $homepageItem . '").html(buildDownloader("rTorrent"));
	                homepageDownloader("rTorrent", "' . $GLOBALS['homepageDownloadRefresh'] . '");
	                // End homepageOrderrTorrent
	                </script>
	                ';
				}
			}
			break;
		case 'homepageOrderdeluge':
			if ($GLOBALS['homepageDelugeEnabled'] && qualifyRequest($GLOBALS['homepageDelugeAuth'])) {
				if ($GLOBALS['delugeCombine']) {
					$item .= '
					<script>
					// Deluge
					buildDownloaderCombined(\'deluge\');
					homepageDownloader("deluge", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End Deluge
					</script>
					';
				} else {
					$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
					$item .= '
					<script>
					// Deluge
					$("#' . $homepageItem . '").html(buildDownloader("deluge"));
					homepageDownloader("deluge", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End Deluge
					</script>
					';
				}
			}
			break;
		case 'homepageOrdertransmission':
			if ($GLOBALS['homepageTransmissionEnabled'] && qualifyRequest($GLOBALS['homepageTransmissionAuth'])) {
				if ($GLOBALS['transmissionCombine']) {
					$item .= '
					<script>
					// Transmission
					buildDownloaderCombined(\'transmission\');
					homepageDownloader("transmission", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End Transmission
					</script>
					';
				} else {
					$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
					$item .= '
					<script>
					// Transmission
					$("#' . $homepageItem . '").html(buildDownloader("transmission"));
					homepageDownloader("transmission", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End Transmission
					</script>
					';
				}
			}
			break;
		case 'homepageOrdernzbget':
			if ($GLOBALS['homepageNzbgetEnabled'] && qualifyRequest($GLOBALS['homepageNzbgetAuth'])) {
				if ($GLOBALS['nzbgetCombine']) {
					$item .= '
					<script>
					// NZBGet
					buildDownloaderCombined(\'nzbget\');
					homepageDownloader("nzbget", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End NZBGet
					</script>
					';
				} else {
					$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
					$item .= '
					<script>
					// NZBGet
					$("#' . $homepageItem . '").html(buildDownloader("nzbget"));
					homepageDownloader("nzbget", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End NZBGet
					</script>
					';
				}
			}
			break;
		case 'homepageOrderjdownloader':
			if ($GLOBALS['homepageJdownloaderEnabled'] && qualifyRequest($GLOBALS['homepageJdownloaderAuth'])) {
				if ($GLOBALS['jdownloaderCombine']) {
					$item .= '
					<script>
					// JDownloader
					buildDownloaderCombined(\'jdownloader\');
					homepageDownloader("jdownloader", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End JDownloader
					</script>
					';
				} else {
					$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
					$item .= '
					<script>
					// JDownloader
					$("#' . $homepageItem . '").html(buildDownloader("jdownloader"));
					homepageDownloader("jdownloader", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End JDownloader
					</script>
					';
				}
			}
			break;
		case 'homepageOrdersabnzbd':
			if ($GLOBALS['homepageSabnzbdEnabled'] && qualifyRequest($GLOBALS['homepageSabnzbdAuth'])) {
				if ($GLOBALS['sabnzbdCombine']) {
					$item .= '
					<script>
					// SabNZBd
					buildDownloaderCombined(\'sabnzbd\');
					homepageDownloader("sabnzbd", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End SabNZBd
					</script>
					';
				} else {
					$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
					$item .= '
					<script>
					// SabNZBd
					$("#' . $homepageItem . '").html(buildDownloader("sabnzbd"));
					homepageDownloader("sabnzbd", "' . $GLOBALS['homepageDownloadRefresh'] . '");
					// End SabNZBd
					</script>
					';
				}
			}
			break;
		case 'homepageOrderplexnowplaying':
			if ($GLOBALS['homepagePlexStreams']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Now Playing...</h2></div>';
				$item .= '
				<script>
				// Plex Stream
				homepageStream("plex", "' . $GLOBALS['homepageStreamRefresh'] . '");
				// End Plex Stream
				</script>
				';
			}
			break;
		case 'homepageOrderplexrecent':
			if ($GLOBALS['homepagePlexRecent']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Recent...</h2></div>';
				$item .= '
				<script>
				// Plex Recent
				homepageRecent("plex", "' . $GLOBALS['homepageRecentRefresh'] . '");
				// End Plex Recent
				</script>
				';
			}
			break;
		case 'homepageOrderplexplaylist':
			if ($GLOBALS['homepagePlexPlaylist']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Playlists...</h2></div>';
				$item .= '
				<script>
				// Plex Playlist
				homepagePlaylist("plex");
				// End Plex Playlist
				</script>
				';
			}
			break;
		case 'homepageOrderembynowplaying':
			if ($GLOBALS['homepageEmbyStreams'] && $GLOBALS['homepageEmbyEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Now Playing...</h2></div>';
				$item .= '
				<script>
				// Emby Stream
				homepageStream("emby", "' . $GLOBALS['homepageStreamRefresh'] . '");
				// End Emby Stream
				</script>
				';
			}
			break;
		case 'homepageOrderembyrecent':
			if ($GLOBALS['homepageEmbyRecent'] && $GLOBALS['homepageEmbyEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Recent...</h2></div>';
				$item .= '
				<script>
				// Emby Recent
				homepageRecent("emby", "' . $GLOBALS['homepageRecentRefresh'] . '");
				// End Emby Recent
				</script>
				';
			}
			break;
		case 'homepageOrderombi':
			if ($GLOBALS['homepageOmbiEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Requests...</h2></div>';
				$item .= '
				<script>
				// Ombi Requests
				homepageRequests("' . $GLOBALS['ombiRefresh'] . '");
				// End Ombi Requests
				</script>
				';
			}
			break;
		case 'homepageOrdercalendar':
			if ($GLOBALS['homepageSonarrEnabled'] && qualifyRequest($GLOBALS['homepageSonarrAuth']) || ($GLOBALS['homepageRadarrEnabled'] && qualifyRequest($GLOBALS['homepageRadarrAuth'])) || ($GLOBALS['homepageSickrageEnabled'] && qualifyRequest($GLOBALS['homepageSickrageAuth'])) || ($GLOBALS['homepageCouchpotatoEnabled'] && qualifyRequest($GLOBALS['homepageCouchpotatoAuth'])) || ($GLOBALS['homepageCalendarEnabled'] && qualifyRequest($GLOBALS['homepageCalendarAuth']) && $GLOBALS['calendariCal'] !== '')) {
				$item .= '
				<div id="calendar" class="fc fc-ltr m-b-30"></div>
				<script>
				// Calendar
				homepageCalendar("' . $GLOBALS['calendarRefresh'] . '");
				// End Calendar
				</script>
				';
			}
			break;
		case 'homepageOrderhealthchecks':
			if ($GLOBALS['homepageHealthChecksEnabled'] && qualifyRequest($GLOBALS['homepageHealthChecksAuth'])) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Health Checks...</h2></div>';
				$item .= '
				<script>
				// Health Checks
				homepageHealthChecks("' . $GLOBALS['healthChecksTags'] . '","' . $GLOBALS['homepageHealthChecksRefresh'] . '");
				// End Health Checks
				</script>
				';
			}
			break;
		case 'homepageOrderunifi':
			if ($GLOBALS['homepageUnifiEnabled'] && qualifyRequest($GLOBALS['homepageUnifiAuth'])) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Unifi...</h2></div>';
				$item .= '
				<script>
				// Unifi
				homepageUnifi("' . $GLOBALS['homepageHealthChecksRefresh'] . '");
				// End Unifi
				</script>
				';
			}
			break;
		case 'homepageOrdertautulli':
			if ($GLOBALS['homepageTautulliEnabled'] && qualifyRequest($GLOBALS['homepageTautulliAuth'])) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Tautulli...</h2></div>';
				$item .= '
				<script>
				// Tautulli
				homepageTautulli("' . $GLOBALS['homepageTautulliRefresh'] . '");
				// End Tautulli
				</script>
				';
			}
			break;
		case 'homepageOrderPihole':
			if ($GLOBALS['homepagePiholeEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Pi-hole Stats...</h2></div>';
				$item .= '
				<script>
				// Pi-hole Stats
				homepagePihole("' . $GLOBALS['homepagePiholeRefresh'] . '");
				// End Pi-hole Stats
				</script>
				';
			}
			break;
		case 'homepageOrderMonitorr':
			if ($GLOBALS['homepageMonitorrEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Monitorr...</h2></div>';
				$item .= '
				<script>
				// Monitorr
				homepageMonitorr("' . $GLOBALS['homepageMonitorrRefresh'] . '");
				// End Monitorr
				</script>
				';
			}
			break;
		case 'homepageOrderWeatherAndAir':
			if ($GLOBALS['homepageWeatherAndAirEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Weather And Air...</h2></div>';
				$item .= '
				<script>
				// Weather And Air
				homepageWeatherAndAir("' . $GLOBALS['homepageWeatherAndAirRefresh'] . '");
				// End Weather And Air
				</script>
				';
			}
			break;
		case 'homepageOrderSpeedtest':
			if ($GLOBALS['homepageSpeedtestEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Speedtest...</h2></div>';
				$item .= '
				<script>
				// Speedtest
				homepageSpeedtest("' . $GLOBALS['homepageSpeedtestRefresh'] . '");
				// End Speedtest
				</script>
				';
			}
			break;
		case 'homepageOrderNetdata':
			if ($GLOBALS['homepageNetdataEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Netdata...</h2></div>';
				$item .= '
				<script>
				// Netdata
				homepageNetdata("' . $GLOBALS['homepageNetdataRefresh'] . '");
				// End Netdata
				</script>
				';
			}
			break;
		default:
			# code...
			break;
	}
	return $item . '</div>';
}

function getHomepageList()
{
	$groups = groupSelect();
	$ombiTvOptions = array(
		array(
			'name' => 'All Seasons',
			'value' => 'all'
		),
		array(
			'name' => 'First Season Only',
			'value' => 'first'
		),
		array(
			'name' => 'Last Season Only',
			'value' => 'last'
		),
	);
	$mediaServers = array(
		array(
			'name' => 'N/A',
			'value' => ''
		),
		array(
			'name' => 'Plex',
			'value' => 'plex'
		),
		array(
			'name' => 'Emby [Not Available]',
			'value' => 'emby'
		)
	);
	$limit = array(
		array(
			'name' => '1 Item',
			'value' => '1'
		),
		array(
			'name' => '2 Items',
			'value' => '2'
		),
		array(
			'name' => '3 Items',
			'value' => '3'
		),
		array(
			'name' => '4 Items',
			'value' => '4'
		),
		array(
			'name' => '5 Items',
			'value' => '5'
		),
		array(
			'name' => '6 Items',
			'value' => '6'
		),
		array(
			'name' => '7 Items',
			'value' => '7'
		),
		array(
			'name' => '8 Items',
			'value' => '8'
		),
		array(
			'name' => 'Unlimited',
			'value' => '1000'
		),
	);
	$day = array(
		array(
			'name' => 'Sunday',
			'value' => '0'
		),
		array(
			'name' => 'Monday',
			'value' => '1'
		),
		array(
			'name' => 'Tueday',
			'value' => '2'
		),
		array(
			'name' => 'Wednesday',
			'value' => '3'
		),
		array(
			'name' => 'Thursday',
			'value' => '4'
		),
		array(
			'name' => 'Friday',
			'value' => '5'
		),
		array(
			'name' => 'Saturday',
			'value' => '6'
		)
	);
	$calendarDefault = array(
		array(
			'name' => 'Month',
			'value' => 'month'
		),
		array(
			'name' => 'Day',
			'value' => 'basicDay'
		),
		array(
			'name' => 'Week',
			'value' => 'basicWeek'
		),
		array(
			'name' => 'List',
			'value' => 'list'
		)
	);
	$timeFormat = array(
		array(
			'name' => '6p',
			'value' => 'h(:mm)t'
		),
		array(
			'name' => '6:00p',
			'value' => 'h:mmt'
		),
		array(
			'name' => '6:00',
			'value' => 'h:mm'
		),
		array(
			'name' => '18',
			'value' => 'H(:mm)'
		),
		array(
			'name' => '18:00',
			'value' => 'H:mm'
		)
	);
	$rTorrentSortOptions = array(
		array(
			'name' => 'Date Desc',
			'value' => 'dated'
		),
		array(
			'name' => 'Date Asc',
			'value' => 'datea'
		),
		array(
			'name' => 'Hash Desc',
			'value' => 'hashd'
		),
		array(
			'name' => 'Hash Asc',
			'value' => 'hasha'
		),
		array(
			'name' => 'Name Desc',
			'value' => 'named'
		),
		array(
			'name' => 'Name Asc',
			'value' => 'namea'
		),
		array(
			'name' => 'Size Desc',
			'value' => 'sized'
		),
		array(
			'name' => 'Size Asc',
			'value' => 'sizea'
		),
		array(
			'name' => 'Label Desc',
			'value' => 'labeld'
		),
		array(
			'name' => 'Label Asc',
			'value' => 'labela'
		),
		array(
			'name' => 'Status Desc',
			'value' => 'statusd'
		),
		array(
			'name' => 'Status Asc',
			'value' => 'statusa'
		),
	);
	$qBittorrentApiOptions = array(
		array(
			'name' => 'V1',
			'value' => '1'
		),
		array(
			'name' => 'V2',
			'value' => '2'
		),
	);
	$qBittorrentSortOptions = array(
		array(
			'name' => 'Hash',
			'value' => 'hash'
		),
		array(
			'name' => 'Name',
			'value' => 'name'
		),
		array(
			'name' => 'Size',
			'value' => 'size'
		),
		array(
			'name' => 'Progress',
			'value' => 'progress'
		),
		array(
			'name' => 'Download Speed',
			'value' => 'dlspeed'
		),
		array(
			'name' => 'Upload Speed',
			'value' => 'upspeed'
		),
		array(
			'name' => 'Priority',
			'value' => 'priority'
		),
		array(
			'name' => 'Number of Seeds',
			'value' => 'num_seeds'
		),
		array(
			'name' => 'Number of Seeds in Swarm',
			'value' => 'num_complete'
		),
		array(
			'name' => 'Number of Leechers',
			'value' => 'num_leechs'
		),
		array(
			'name' => 'Number of Leechers in Swarm',
			'value' => 'num_incomplete'
		),
		array(
			'name' => 'Ratio',
			'value' => 'ratio'
		),
		array(
			'name' => 'ETA',
			'value' => 'eta'
		),
		array(
			'name' => 'State',
			'value' => 'state'
		),
		array(
			'name' => 'Category',
			'value' => 'category'
		)
	);
	$xmlStatus = (extension_loaded('xmlrpc')) ? 'Installed' : 'Not Installed';
	return array(
		array(
			'name' => 'Calendar',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/calendar.png',
			'category' => 'HOMEPAGE',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageCalendarEnabled',
						'label' => 'Enable iCal',
						'value' => $GLOBALS['homepageCalendarEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageCalendarAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageCalendarAuth'],
						'options' => $groups
					),
					array(
						'type' => 'input',
						'name' => 'calendariCal',
						'label' => 'iCal URL\'s',
						'value' => $GLOBALS['calendariCal'],
						'placeholder' => 'separate by comma\'s'
					),
				),
				'Misc Options' => array(
					array(
						'type' => 'number',
						'name' => 'calendarStart',
						'label' => '# of Days Before',
						'value' => $GLOBALS['calendarStart'],
						'placeholder' => ''
					),
					array(
						'type' => 'number',
						'name' => 'calendarEnd',
						'label' => '# of Days After',
						'value' => $GLOBALS['calendarEnd'],
						'placeholder' => ''
					),
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					)
				),
			)
		),
		array(
			'name' => 'Plex',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/plex.png',
			'category' => 'Media Server',
			//'license' => $GLOBALS['license'],
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePlexEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePlexEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePlexAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepagePlexAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'plexURL',
						'label' => 'URL',
						'value' => $GLOBALS['plexURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'plexToken',
						'label' => 'Token',
						'value' => $GLOBALS['plexToken']
					),
					array(
						'type' => 'password-alt',
						'name' => 'plexID',
						'label' => 'Plex Machine',
						'value' => $GLOBALS['plexID']
					)
				),
				'Active Streams' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePlexStreams',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePlexStreams']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePlexStreamsAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepagePlexStreamsAuth'],
						'options' => $groups
					),
					array(
						'type' => 'switch',
						'name' => 'homepageShowStreamNames',
						'label' => 'User Information',
						'value' => $GLOBALS['homepageShowStreamNames']
					),
					array(
						'type' => 'select',
						'name' => 'homepageShowStreamNamesAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepageShowStreamNamesAuth'],
						'options' => $groups
					),
					array(
						'type' => 'select',
						'name' => 'homepageStreamRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageStreamRefresh'],
						'options' => optionTime()
					),
				),
				'Recent Items' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePlexRecent',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePlexRecent']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePlexRecentAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepagePlexRecentAuth'],
						'options' => $groups
					),
					array(
						'type' => 'number',
						'name' => 'homepageRecentLimit',
						'label' => 'Item Limit',
						'value' => $GLOBALS['homepageRecentLimit'],
					),
					array(
						'type' => 'select',
						'name' => 'homepageRecentRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageRecentRefresh'],
						'options' => optionTime()
					),
				),
				'Media Search' => array(
					array(
						'type' => 'switch',
						'name' => 'mediaSearch',
						'label' => 'Enable',
						'value' => $GLOBALS['mediaSearch']
					),
					array(
						'type' => 'select',
						'name' => 'mediaSearchAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['mediaSearchAuth'],
						'options' => $groups
					),
					array(
						'type' => 'select',
						'name' => 'mediaSearchType',
						'label' => 'Media Server',
						'value' => $GLOBALS['mediaSearchType'],
						'options' => $mediaServers
					),
				),
				'Playlists' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePlexPlaylist',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePlexPlaylist']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePlexPlaylistAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepagePlexPlaylistAuth'],
						'options' => $groups
					),
				),
				'Misc Options' => array(
					array(
						'type' => 'input',
						'name' => 'plexTabName',
						'label' => 'Plex Tab Name',
						'value' => $GLOBALS['plexTabName'],
						'placeholder' => 'Only use if you have Plex in a reverse proxy'
					),
					array(
						'type' => 'input',
						'name' => 'plexTabURL',
						'label' => 'Plex Tab WAN URL',
						'value' => $GLOBALS['plexTabURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'select',
						'name' => 'cacheImageSize',
						'label' => 'Image Cache Size',
						'value' => $GLOBALS['cacheImageSize'],
						'options' => array(
							array(
								'name' => 'Low',
								'value' => '.5'
							),
							array(
								'name' => '1x',
								'value' => '1'
							),
							array(
								'name' => '2x',
								'value' => '2'
							),
							array(
								'name' => '3x',
								'value' => '3'
							)
						)
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'plex\')"'
					),
				)
			)
		),
		array(
			'name' => 'Emby-Jellyfin',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/emby.png',
			'category' => 'Media Server',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageEmbyEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageEmbyEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageEmbyAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageEmbyAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'embyURL',
						'label' => 'URL',
						'value' => $GLOBALS['embyURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too. Make sure if Jelly fin to end url with /jellyfin',
						'placeholder' => 'http(s)://hostname:port - make sure if Jelly fin to end url with /jellyfin'
					),
					array(
						'type' => 'password-alt',
						'name' => 'embyToken',
						'label' => 'Token',
						'value' => $GLOBALS['embyToken']
					)
				),
				'Active Streams' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageEmbyStreams',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageEmbyStreams']
					),
					array(
						'type' => 'select',
						'name' => 'homepageEmbyStreamsAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepageEmbyStreamsAuth'],
						'options' => $groups
					),
					array(
						'type' => 'switch',
						'name' => 'homepageShowStreamNames',
						'label' => 'User Information',
						'value' => $GLOBALS['homepageShowStreamNames']
					),
					array(
						'type' => 'select',
						'name' => 'homepageShowStreamNamesAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepageShowStreamNamesAuth'],
						'options' => $groups
					),
					array(
						'type' => 'select',
						'name' => 'homepageStreamRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageStreamRefresh'],
						'options' => optionTime()
					),
				),
				'Recent Items' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageEmbyRecent',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageEmbyRecent']
					),
					array(
						'type' => 'select',
						'name' => 'homepageEmbyRecentAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepageEmbyRecentAuth'],
						'options' => $groups
					),
					array(
						'type' => 'number',
						'name' => 'homepageRecentLimit',
						'label' => 'Item Limit',
						'value' => $GLOBALS['homepageRecentLimit'],
					),
					array(
						'type' => 'select',
						'name' => 'homepageRecentRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageRecentRefresh'],
						'options' => optionTime()
					),
				),
				'Misc Options' => array(
					array(
						'type' => 'input',
						'name' => 'embyTabName',
						'label' => 'Emby Tab Name',
						'value' => $GLOBALS['embyTabName'],
						'placeholder' => 'Only use if you have Emby in a reverse proxy'
					),
					array(
						'type' => 'input',
						'name' => 'embyTabURL',
						'label' => 'Emby Tab WAN URL',
						'value' => $GLOBALS['embyTabURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'select',
						'name' => 'cacheImageSize',
						'label' => 'Image Cache Size',
						'value' => $GLOBALS['cacheImageSize'],
						'options' => array(
							array(
								'name' => 'Low',
								'value' => '.5'
							),
							array(
								'name' => '1x',
								'value' => '1'
							),
							array(
								'name' => '2x',
								'value' => '2'
							),
							array(
								'name' => '3x',
								'value' => '3'
							)
						)
					)
				)
			)
		),
		array(
			'name' => 'JDownloader',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/jdownloader.png',
			'category' => 'Downloader',
			'settings' => array(
				'custom' => '
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
								<span lang="en">Notice</span>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
									<ul class="list-icons">
                                        <li><i class="fa fa-chevron-right text-danger"></i> <a href="https://pypi.org/project/myjd-api/" target="_blank">Download [myjd-api] Module</a></li>
                                        <li><i class="fa fa-chevron-right text-danger"></i> Add <b>/api/myjd</b> to the URL if you are using <a href="https://pypi.org/project/RSScrawler/" target="_blank">RSScrawler</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				',
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageJdownloaderEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageJdownloaderEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageJdownloaderAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageJdownloaderAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'jdownloaderURL',
						'label' => 'URL',
						'value' => $GLOBALS['jdownloaderURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'jdownloaderCombine',
						'label' => 'Add to Combined Downloader',
						'value' => $GLOBALS['jdownloaderCombine']
					),
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'jdownloader\')"'
					),
				)
			)
		),
		array(
			'name' => 'SabNZBD',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/sabnzbd.png',
			'category' => 'Downloader',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageSabnzbdEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageSabnzbdEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageSabnzbdAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageSabnzbdAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'sabnzbdURL',
						'label' => 'URL',
						'value' => $GLOBALS['sabnzbdURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'sabnzbdToken',
						'label' => 'Token',
						'value' => $GLOBALS['sabnzbdToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'sabnzbdCombine',
						'label' => 'Add to Combined Downloader',
						'value' => $GLOBALS['sabnzbdCombine']
					),
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'sabnzbd\')"'
					),
				)
			)
		),
		array(
			'name' => 'NZBGet',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/nzbget.png',
			'category' => 'Downloader',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageNzbgetEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageNzbgetEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageNzbgetAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageNzbgetAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'nzbgetURL',
						'label' => 'URL',
						'value' => $GLOBALS['nzbgetURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'input',
						'name' => 'nzbgetUsername',
						'label' => 'Username',
						'value' => $GLOBALS['nzbgetUsername']
					),
					array(
						'type' => 'password',
						'name' => 'nzbgetPassword',
						'label' => 'Password',
						'value' => $GLOBALS['nzbgetPassword']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'nzbgetCombine',
						'label' => 'Add to Combined Downloader',
						'value' => $GLOBALS['nzbgetCombine']
					),
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'nzbget\')"'
					),
				)
			)
		),
		array(
			'name' => 'Transmission',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/transmission.png',
			'category' => 'Downloader',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageTransmissionEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageTransmissionEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageTransmissionAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageTransmissionAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'transmissionURL',
						'label' => 'URL',
						'value' => $GLOBALS['transmissionURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'input',
						'name' => 'transmissionUsername',
						'label' => 'Username',
						'value' => $GLOBALS['transmissionUsername']
					),
					array(
						'type' => 'password',
						'name' => 'transmissionPassword',
						'label' => 'Password',
						'value' => $GLOBALS['transmissionPassword']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'switch',
						'name' => 'transmissionHideSeeding',
						'label' => 'Hide Seeding',
						'value' => $GLOBALS['transmissionHideSeeding']
					), array(
						'type' => 'switch',
						'name' => 'transmissionHideCompleted',
						'label' => 'Hide Completed',
						'value' => $GLOBALS['transmissionHideCompleted']
					),
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'transmissionCombine',
						'label' => 'Add to Combined Downloader',
						'value' => $GLOBALS['transmissionCombine']
					),
				)
			)
		),
		array(
			'name' => 'qBittorrent',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/qBittorrent.png',
			'category' => 'Downloader',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageqBittorrentEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageqBittorrentEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageqBittorrentAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageqBittorrentAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'qBittorrentURL',
						'label' => 'URL',
						'value' => $GLOBALS['qBittorrentURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'select',
						'name' => 'qBittorrentApiVersion',
						'label' => 'API Version',
						'value' => $GLOBALS['qBittorrentApiVersion'],
						'options' => $qBittorrentApiOptions
					),
					array(
						'type' => 'input',
						'name' => 'qBittorrentUsername',
						'label' => 'Username',
						'value' => $GLOBALS['qBittorrentUsername']
					),
					array(
						'type' => 'password',
						'name' => 'qBittorrentPassword',
						'label' => 'Password',
						'value' => $GLOBALS['qBittorrentPassword']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'switch',
						'name' => 'qBittorrentHideSeeding',
						'label' => 'Hide Seeding',
						'value' => $GLOBALS['qBittorrentHideSeeding']
					),
					array(
						'type' => 'switch',
						'name' => 'qBittorrentHideCompleted',
						'label' => 'Hide Completed',
						'value' => $GLOBALS['qBittorrentHideCompleted']
					),
					array(
						'type' => 'select',
						'name' => 'qBittorrentSortOrder',
						'label' => 'Order',
						'value' => $GLOBALS['qBittorrentSortOrder'],
						'options' => $qBittorrentSortOptions
					), array(
						'type' => 'switch',
						'name' => 'qBittorrentReverseSorting',
						'label' => 'Reverse Sorting',
						'value' => $GLOBALS['qBittorrentReverseSorting']
					),
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'qBittorrentCombine',
						'label' => 'Add to Combined Downloader',
						'value' => $GLOBALS['qBittorrentCombine']
					),
				)
			)
		),
		array(
			'name' => 'rTorrent',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/rTorrent.png',
			'category' => 'Downloader',
			'settings' => array(
				'FYI' => array(
					array(
						'type' => 'html',
						'label' => '',
						'override' => 12,
						'html' => '
						<div class="row">
						    <div class="col-lg-12">
						        <div class="panel panel-info">
						            <div class="panel-heading">
						                <span lang="en">ATTENTION</span>
						            </div>
						            <div class="panel-wrapper collapse in" aria-expanded="true">
						                <div class="panel-body">
						                	<h4 lang="en">This module requires XMLRPC</h4>
						                    <span lang="en">Status: [ <b>' . $xmlStatus . '</b> ]</span>
						                    <br/></br>
						                    <span lang="en">
						                    	<h4><b>Note about API URL</b></h4>
						                    	Organizr appends the url with <code>/RPC2</code> unless the URL ends in <code>.php</code><br/>
						                    	<h5>Possible URLs:</h5>
						                    	<li>http://localhost:8080</li>
						                    	<li>https://domain.site/xmlrpc.php</li>
						                    	<li>https://seedbox.site/rutorrent/plugins/httprpc/action.php</li>
						                    </span>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
						'
					)
				),
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagerTorrentEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagerTorrentEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepagerTorrentAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepagerTorrentAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'rTorrentURL',
						'label' => 'URL',
						'value' => $GLOBALS['rTorrentURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'input',
						'name' => 'rTorrentURLOverride',
						'label' => 'rTorrent API URL Override',
						'value' => $GLOBALS['rTorrentURLOverride'],
						'help' => 'Only use if you cannot connect.  Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port/xmlrpc'
					),
					array(
						'type' => 'input',
						'name' => 'rTorrentUsername',
						'label' => 'Username',
						'value' => $GLOBALS['rTorrentUsername']
					),
					array(
						'type' => 'password',
						'name' => 'rTorrentPassword',
						'label' => 'Password',
						'value' => $GLOBALS['rTorrentPassword']
					),
					array(
						'type' => 'switch',
						'name' => 'rTorrentDisableCertCheck',
						'label' => 'Disable Certificate Check',
						'value' => $GLOBALS['rTorrentDisableCertCheck']
					),
				),
				'Misc Options' => array(
					array(
						'type' => 'switch',
						'name' => 'rTorrentHideSeeding',
						'label' => 'Hide Seeding',
						'value' => $GLOBALS['rTorrentHideSeeding']
					), array(
						'type' => 'switch',
						'name' => 'rTorrentHideCompleted',
						'label' => 'Hide Completed',
						'value' => $GLOBALS['rTorrentHideCompleted']
					),
					array(
						'type' => 'select',
						'name' => 'rTorrentSortOrder',
						'label' => 'Order',
						'value' => $GLOBALS['rTorrentSortOrder'],
						'options' => $rTorrentSortOptions
					),
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'rTorrentCombine',
						'label' => 'Add to Combined Downloader',
						'value' => $GLOBALS['rTorrentCombine']
					),
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'rtorrent\')"'
					),
				)
			)
		),
		array(
			'name' => 'Deluge',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/deluge.png',
			'category' => 'Downloader',
			'settings' => array(
				'custom' => '
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
								<span lang="en">Notice</span>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
									<ul class="list-icons">
                                        <li><i class="fa fa-chevron-right text-danger"></i> <a href="https://github.com/idlesign/deluge-webapi/tree/master/dist" target="_blank">Download Plugin</a></li>
                                        <li><i class="fa fa-chevron-right text-danger"></i> Open Deluge Web UI, go to "Preferences -> Plugins -> Install plugin" and choose egg file.</li>
                                        <li><i class="fa fa-chevron-right text-danger"></i> Activate WebAPI plugin </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				',
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageDelugeEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageDelugeEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageDelugeAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageDelugeAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'delugeURL',
						'label' => 'URL',
						'value' => $GLOBALS['delugeURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password',
						'name' => 'delugePassword',
						'label' => 'Password',
						'value' => $GLOBALS['delugePassword']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'switch',
						'name' => 'delugeHideSeeding',
						'label' => 'Hide Seeding',
						'value' => $GLOBALS['delugeHideSeeding']
					), array(
						'type' => 'switch',
						'name' => 'delugeHideCompleted',
						'label' => 'Hide Completed',
						'value' => $GLOBALS['delugeHideCompleted']
					),
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'delugeCombine',
						'label' => 'Add to Combined Downloader',
						'value' => $GLOBALS['delugeCombine']
					),
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'deluge\')"'
					),
				)
			)
		),
		array(
			'name' => 'Sonarr',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/sonarr.png',
			'category' => 'PVR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageSonarrEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageSonarrEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageSonarrAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageSonarrAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'sonarrURL',
						'label' => 'URL',
						'value' => $GLOBALS['sonarrURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'sonarrToken',
						'label' => 'Token',
						'value' => $GLOBALS['sonarrToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'number',
						'name' => 'calendarStart',
						'label' => '# of Days Before',
						'value' => $GLOBALS['calendarStart'],
						'placeholder' => ''
					),
					array(
						'type' => 'number',
						'name' => 'calendarEnd',
						'label' => '# of Days After',
						'value' => $GLOBALS['calendarEnd'],
						'placeholder' => ''
					),
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'sonarrUnmonitored',
						'label' => 'Show Unmonitored',
						'value' => $GLOBALS['sonarrUnmonitored']
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'sonarr\')"'
					),
				)
			)
		),
		array(
			'name' => 'Lidarr',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/lidarr.png',
			'category' => 'PMR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageLidarrEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageLidarrEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageLidarrAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageLidarrAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'lidarrURL',
						'label' => 'URL',
						'value' => $GLOBALS['lidarrURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'lidarrToken',
						'label' => 'Token',
						'value' => $GLOBALS['lidarrToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'number',
						'name' => 'calendarStart',
						'label' => '# of Days Before',
						'value' => $GLOBALS['calendarStart'],
						'placeholder' => ''
					),
					array(
						'type' => 'number',
						'name' => 'calendarEnd',
						'label' => '# of Days After',
						'value' => $GLOBALS['calendarEnd'],
						'placeholder' => ''
					),
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					),
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'lidarr\')"'
					),
				)
			)
		),
		array(
			'name' => 'Radarr',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/radarr.png',
			'category' => 'PVR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageRadarrEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageRadarrEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageRadarrAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageRadarrAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'radarrURL',
						'label' => 'URL',
						'value' => $GLOBALS['radarrURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'radarrToken',
						'label' => 'Token',
						'value' => $GLOBALS['radarrToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'number',
						'name' => 'calendarStart',
						'label' => '# of Days Before',
						'value' => $GLOBALS['calendarStart'],
						'placeholder' => ''
					),
					array(
						'type' => 'number',
						'name' => 'calendarEnd',
						'label' => '# of Days After',
						'value' => $GLOBALS['calendarEnd'],
						'placeholder' => ''
					),
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'radarr\')"'
					),
				)
			)
		),
		array(
			'name' => 'CouchPotato',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/couchpotato.png',
			'category' => 'PVR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageCouchpotatoEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageCouchpotatoEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageCouchpotatoAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageCouchpotatoAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'couchpotatoURL',
						'label' => 'URL',
						'value' => $GLOBALS['couchpotatoURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'couchpotatoToken',
						'label' => 'Token',
						'value' => $GLOBALS['couchpotatoToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					)
				)
			)
		),
		array(
			'name' => 'SickRage',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/sickrage.png',
			'category' => 'PVR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageSickrageEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageSickrageEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageSickrageAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageSickrageAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'sickrageURL',
						'label' => 'URL',
						'value' => $GLOBALS['sickrageURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'sickrageToken',
						'label' => 'Token',
						'value' => $GLOBALS['sickrageToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					)
				)
			)
		),
		array(
			'name' => 'Ombi',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/ombi.png',
			'category' => 'Requests',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageOmbiEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageOmbiEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageOmbiAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageOmbiAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'ombiURL',
						'label' => 'URL',
						'value' => $GLOBALS['ombiURL'],
						'help' => 'Please make sure to use local IP address and port - You also may use local dns name too.',
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'ombiToken',
						'label' => 'Token',
						'value' => $GLOBALS['ombiToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageOmbiRequestAuth',
						'label' => 'Minimum Group to Request',
						'value' => $GLOBALS['homepageOmbiRequestAuth'],
						'options' => $groups
					),
					array(
						'type' => 'select',
						'name' => 'ombiTvDefault',
						'label' => 'TV Show Default Request',
						'value' => $GLOBALS['ombiTvDefault'],
						'options' => $ombiTvOptions
					),
					array(
						'type' => 'switch',
						'name' => 'ombiLimitUser',
						'label' => 'Limit to User',
						'value' => $GLOBALS['ombiLimitUser']
					),
					array(
						'type' => 'number',
						'name' => 'ombiLimit',
						'label' => 'Item Limit',
						'value' => $GLOBALS['ombiLimit'],
					),
					array(
						'type' => 'select',
						'name' => 'ombiRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['ombiRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'ombiAlias',
						'label' => 'Use Ombi Alias Names',
						'value' => $GLOBALS['ombiAlias'],
						'help' => 'Use Ombi Alias Names instead of Usernames - If Alias is blank, Alias will fallback to Username'
					)
				),
				'Default Filter' => array(
					array(
						'type' => 'switch',
						'name' => 'ombiDefaultFilterAvailable',
						'label' => 'Show Available',
						'value' => $GLOBALS['ombiDefaultFilterAvailable'],
						'help' => 'Show All Available Ombi Requests'
					),
					array(
						'type' => 'switch',
						'name' => 'ombiDefaultFilterUnavailable',
						'label' => 'Show Unavailable',
						'value' => $GLOBALS['ombiDefaultFilterUnavailable'],
						'help' => 'Show All Unavailable Ombi Requests'
					),
					array(
						'type' => 'switch',
						'name' => 'ombiDefaultFilterApproved',
						'label' => 'Show Approved',
						'value' => $GLOBALS['ombiDefaultFilterApproved'],
						'help' => 'Show All Approved Ombi Requests'
					),
					array(
						'type' => 'switch',
						'name' => 'ombiDefaultFilterUnapproved',
						'label' => 'Show Unapproved',
						'value' => $GLOBALS['ombiDefaultFilterUnapproved'],
						'help' => 'Show All Unapproved Ombi Requests'
					),
					array(
						'type' => 'switch',
						'name' => 'ombiDefaultFilterDenied',
						'label' => 'Show Denied',
						'value' => $GLOBALS['ombiDefaultFilterDenied'],
						'help' => 'Show All Denied Ombi Requests'
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'ombi\')"'
					),
				)
			)
		),
		array(
			'name' => 'Unifi',
			'enabled' => true,
			'image' => 'plugins/images/tabs/ubnt.png',
			'category' => 'Monitor',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageUnifiEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageUnifiEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageUnifiAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageUnifiAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'unifiURL',
						'label' => 'URL',
						'value' => $GLOBALS['unifiURL'],
						'help' => 'URL for Unifi',
						'placeholder' => 'Unifi API URL'
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
					array(
						'type' => 'input',
						'name' => 'unifiUsername',
						'label' => 'Username',
						'value' => $GLOBALS['unifiUsername']
					),
					array(
						'type' => 'password',
						'name' => 'unifiPassword',
						'label' => 'Password',
						'value' => $GLOBALS['unifiPassword']
					),
					array(
						'type' => 'input',
						'name' => 'unifiSiteName',
						'label' => 'Site Name',
						'value' => $GLOBALS['unifiSiteName'],
						'help' => 'Site Name - not Site ID nor Site Description',
					),
					array(
						'type' => 'button',
						'label' => 'Grab Unifi Site',
						'icon' => 'fa fa-building',
						'text' => 'Get Unifi Site',
						'attr' => 'onclick="getUnifiSite(\'unifiSite\')"'
					),
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageUnifiRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageUnifiRefresh'],
						'options' => optionTime()
					),
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'unifi\')"'
					),
				)
			)
		),
		array(
			'name' => 'HealthChecks',
			'enabled' => true,
			'image' => 'plugins/images/tabs/healthchecks.png',
			'category' => 'Monitor',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageHealthChecksEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageHealthChecksEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageHealthChecksAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageHealthChecksAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'healthChecksURL',
						'label' => 'URL',
						'value' => $GLOBALS['healthChecksURL'],
						'help' => 'URL for HealthChecks API',
						'placeholder' => 'HealthChecks API URL'
					),
					array(
						'type' => 'password-alt',
						'name' => 'healthChecksToken',
						'label' => 'Token',
						'value' => $GLOBALS['healthChecksToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'input',
						'name' => 'healthChecksTags',
						'label' => 'Tags',
						'value' => $GLOBALS['healthChecksTags'],
						'help' => 'Pull only checks with this tag - Blank for all',
						'placeholder' => 'Multiple tags using CSV - tag1,tag2'
					),
					array(
						'type' => 'select',
						'name' => 'homepageHealthChecksRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageHealthChecksRefresh'],
						'options' => optionTime()
					),
				),
			)
		),
		array(
			'name' => 'CustomHTML-1',
			'enabled' => (strpos('personal,business', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/custom1.png',
			'category' => 'Custom',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagCustomHTMLoneEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagCustomHTMLoneEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepagCustomHTMLoneAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepagCustomHTMLoneAuth'],
						'options' => $groups
					)
				),
				'Code' => array(
					array(
						'type' => 'textbox',
						'name' => 'customHTMLone',
						'class' => 'hidden customHTMLoneTextarea',
						'label' => '',
						'value' => $GLOBALS['customHTMLone'],
					),
					array(
						'type' => 'html',
						'override' => 12,
						'label' => 'Custom HTML/JavaScript',
						'html' => '<button type="button" class="hidden savecustomHTMLoneTextarea btn btn-info btn-circle pull-right m-r-5 m-l-10"><i class="fa fa-save"></i> </button><div id="customHTMLoneEditor" style="height:300px">' . htmlentities($GLOBALS['customHTMLone']) . '</div>'
					),
				)
			)
		),
		array(
			'name' => 'CustomHTML-2',
			'enabled' => (strpos('personal,business', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/custom2.png',
			'category' => 'Custom',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagCustomHTMLtwoEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagCustomHTMLtwoEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepagCustomHTMLtwoAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepagCustomHTMLtwoAuth'],
						'options' => $groups
					)
				),
				'Code' => array(
					array(
						'type' => 'textbox',
						'name' => 'customHTMLtwo',
						'class' => 'hidden customHTMLtwoTextarea',
						'label' => '',
						'value' => $GLOBALS['customHTMLtwo'],
					),
					array(
						'type' => 'html',
						'override' => 12,
						'label' => 'Custom HTML/JavaScript',
						'html' => '<button type="button" class="hidden savecustomHTMLtwoTextarea btn btn-info btn-circle pull-right m-r-5 m-l-10"><i class="fa fa-save"></i> </button><div id="customHTMLtwoEditor" style="height:300px">' . htmlentities($GLOBALS['customHTMLtwo']) . '</div>'
					),
				)
			)
		),
		array(
			'name' => 'Misc',
			'enabled' => true,
			'image' => 'plugins/images/organizr/logo-no-border.png',
			'category' => 'Custom',
			'settings' => array(
				'YouTube' => array(
					array(
						'type' => 'input',
						'name' => 'youtubeAPI',
						'label' => 'Youtube API Key',
						'value' => $GLOBALS['youtubeAPI'],
						'help' => 'Please make sure to input this API key as the organizr one gets limited'
					),
					array(
						'type' => 'html',
						'override' => 6,
						'label' => 'Instructions',
						'html' => '<a href="https://www.slickremix.com/docs/get-api-key-for-youtube/" target="_blank">Click here for instructions</a>'
					),
				)
			)
		),
		array(
			'name' => 'Pi-hole',
			'enabled' => true,
			'image' => 'plugins/images/tabs/pihole.png',
			'category' => 'Monitor',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePiholeEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePiholeEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePiholeAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepagePiholeAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'piholeURL',
						'label' => 'URL',
						'value' => $GLOBALS['piholeURL'],
						'help' => 'Please make sure to use local IP address and port and to include \'/admin/\' at the end of the URL. You can add multiple Pi-holes by comma separating the URLs.',
						'placeholder' => 'http(s)://hostname:port/admin/'
					),
				),
				'Misc' => array(
					array(
						'type' => 'switch',
						'name' => 'piholeHeaderToggle',
						'label' => 'Toggle Title',
						'value' => $GLOBALS['piholeHeaderToggle'],
						'help' => 'Shows/hides the title of this homepage module'
					),
					array(
						'type' => 'switch',
						'name' => 'homepagePiholeCombine',
						'label' => 'Combine stat cards',
						'value' => $GLOBALS['homepagePiholeCombine'],
						'help' => 'This controls whether to combine the stats for multiple piholes into 1 card.',
					),
				),
			)
		),
		array(
			'name' => 'Tautulli',
			'enabled' => true,
			'image' => 'plugins/images/tabs/tautulli.png',
			'category' => 'Monitor',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageTautulliEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageTautulliEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageTautulliAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageTautulliAuth'],
						'options' => $groups
					)
				),
				'Options' => array(
					array(
						'type' => 'input',
						'name' => 'tautulliHeader',
						'label' => 'Title',
						'value' => $GLOBALS['tautulliHeader'],
						'help' => 'Sets the title of this homepage module'
					),
					array(
						'type' => 'switch',
						'name' => 'tautulliHeaderToggle',
						'label' => 'Toggle Title',
						'value' => $GLOBALS['tautulliHeaderToggle'],
						'help' => 'Shows/hides the title of this homepage module'
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'tautulliURL',
						'label' => 'URL',
						'value' => $GLOBALS['tautulliURL'],
						'help' => 'URL for Tautulli API, include the IP, the port and the base URL (e.g. /tautulli/) in the URL',
						'placeholder' => 'http://<ip>:<port>'
					),
					array(
						'type' => 'password-alt',
						'name' => 'tautulliApikey',
						'label' => 'API Key',
						'value' => $GLOBALS['tautulliApikey']
					),
					array(
						'type' => 'select',
						'name' => 'homepageTautulliRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageTautulliRefresh'],
						'options' => optionTime()
					),
				),
				'Library Stats' => array(
					array(
						'type' => 'switch',
						'name' => 'tautulliLibraries',
						'label' => 'Libraries',
						'value' => $GLOBALS['tautulliLibraries'],
						'help' => 'Shows/hides the card with library information.',
					),
					array(
						'type' => 'select',
						'name' => 'homepageTautulliLibraryAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageTautulliLibraryAuth'],
						'options' => $groups
					),
				),
				'Viewing Stats' => array(
					array(
						'type' => 'switch',
						'name' => 'tautulliPopularMovies',
						'label' => 'Popular Movies',
						'value' => $GLOBALS['tautulliPopularMovies'],
						'help' => 'Shows/hides the card with Popular Movies information.',
					),
					array(
						'type' => 'switch',
						'name' => 'tautulliPopularTV',
						'label' => 'Popular TV',
						'value' => $GLOBALS['tautulliPopularTV'],
						'help' => 'Shows/hides the card with Popular TV information.',
					),
					array(
						'type' => 'switch',
						'name' => 'tautulliTopMovies',
						'label' => 'Top Movies',
						'value' => $GLOBALS['tautulliTopMovies'],
						'help' => 'Shows/hides the card with Top Movies information.',
					),
					array(
						'type' => 'switch',
						'name' => 'tautulliTopTV',
						'label' => 'Top TV',
						'value' => $GLOBALS['tautulliTopTV'],
						'help' => 'Shows/hides the card with Top TV information.',
					),
					array(
						'type' => 'select',
						'name' => 'homepageTautulliViewsAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageTautulliViewsAuth'],
						'options' => $groups
					),
				),
				'Misc Stats' => array(
					array(
						'type' => 'switch',
						'name' => 'tautulliTopUsers',
						'label' => 'Top Users',
						'value' => $GLOBALS['tautulliTopUsers'],
						'help' => 'Shows/hides the card with Top Users information.',
					),
					array(
						'type' => 'switch',
						'name' => 'tautulliTopPlatforms',
						'label' => 'Top Platforms',
						'value' => $GLOBALS['tautulliTopPlatforms'],
						'help' => 'Shows/hides the card with Top Platforms information.',
					),
					array(
						'type' => 'select',
						'name' => 'homepageTautulliMiscAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageTautulliMiscAuth'],
						'options' => $groups
					),
				),
			)
		),
		array(
			'name' => 'Monitorr',
			'enabled' => true,
			'image' => 'plugins/images/tabs/monitorr.png',
			'category' => 'Monitor',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageMonitorrEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageMonitorrEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageMonitorrAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageMonitorrAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'monitorrURL',
						'label' => 'URL',
						'value' => $GLOBALS['monitorrURL'],
						'help' => 'URL for Monitorr. Please use the revers proxy URL i.e. https://domain.com/monitorr/.',
						'placeholder' => 'http://domain.com/monitorr/'
					),
					array(
						'type' => 'select',
						'name' => 'homepageMonitorrRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageMonitorrRefresh'],
						'options' => optionTime()
					),
				),
				'Options' => array(
					array(
						'type' => 'input',
						'name' => 'monitorrHeader',
						'label' => 'Title',
						'value' => $GLOBALS['monitorrHeader'],
						'help' => 'Sets the title of this homepage module',
					),
					array(
						'type' => 'switch',
						'name' => 'monitorrHeaderToggle',
						'label' => 'Toggle Title',
						'value' => $GLOBALS['monitorrHeaderToggle'],
						'help' => 'Shows/hides the title of this homepage module'
					),
					array(
						'type' => 'switch',
						'name' => 'monitorrCompact',
						'label' => 'Compact view',
						'value' => $GLOBALS['monitorrCompact'],
						'help' => 'Toggles the compact view of this homepage module'
					),
				),
			)
		),
		array(
			'name' => 'Weather-Air',
			'enabled' => true,
			'image' => 'plugins/images/tabs/wind.png',
			'category' => 'Monitor',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageWeatherAndAirEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageWeatherAndAirEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageWeatherAndAirAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageWeatherAndAirAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'homepageWeatherAndAirLatitude',
						'label' => 'Latitude',
						'value' => $GLOBALS['homepageWeatherAndAirLatitude'],
						'help' => 'Please enter full latitude including minus if needed'
					),
					array(
						'type' => 'input',
						'name' => 'homepageWeatherAndAirLongitude',
						'label' => 'Longitude',
						'value' => $GLOBALS['homepageWeatherAndAirLongitude'],
						'help' => 'Please enter full longitude including minus if needed'
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-search',
						'class' => 'pull-right',
						'text' => 'Need Help With Coordinates?',
						'attr' => 'onclick="showLookupCoordinatesModal()"'
					),
				),
				'Options' => array(
					array(
						'type' => 'input',
						'name' => 'homepageWeatherAndAirWeatherHeader',
						'label' => 'Title',
						'value' => $GLOBALS['homepageWeatherAndAirWeatherHeader'],
						'help' => 'Sets the title of this homepage module',
					),
					array(
						'type' => 'switch',
						'name' => 'homepageWeatherAndAirWeatherHeaderToggle',
						'label' => 'Toggle Title',
						'value' => $GLOBALS['homepageWeatherAndAirWeatherHeaderToggle'],
						'help' => 'Shows/hides the title of this homepage module'
					),
					array(
						'type' => 'switch',
						'name' => 'homepageWeatherAndAirWeatherEnabled',
						'label' => 'Enable Weather',
						'value' => $GLOBALS['homepageWeatherAndAirWeatherEnabled'],
						'help' => 'Toggles the view module for Weather'
					),
					array(
						'type' => 'switch',
						'name' => 'homepageWeatherAndAirAirQualityEnabled',
						'label' => 'Enable Air Quality',
						'value' => $GLOBALS['homepageWeatherAndAirAirQualityEnabled'],
						'help' => 'Toggles the view module for Air Quality'
					),
					array(
						'type' => 'switch',
						'name' => 'homepageWeatherAndAirPollenEnabled',
						'label' => 'Enable Pollen',
						'value' => $GLOBALS['homepageWeatherAndAirPollenEnabled'],
						'help' => 'Toggles the view module for Pollen'
					),
					array(
						'type' => 'select',
						'name' => 'homepageWeatherAndAirUnits',
						'label' => 'Unit of Measurement',
						'value' => $GLOBALS['homepageWeatherAndAirUnits'],
						'options' => array(
							array(
								'name' => 'Imperial',
								'value' => 'imperial'
							),
							array(
								'name' => 'Metric',
								'value' => 'metric'
							)
						)
					),
					array(
						'type' => 'select',
						'name' => 'homepageWeatherAndAirRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageWeatherAndAirRefresh'],
						'options' => optionTime()
					),
				),
			)
		),
		array(
			'name' => 'Speedtest',
			'enabled' => true,
			'image' => 'plugins/images/tabs/speedtest-icon.png',
			'category' => 'Monitor',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'html',
						'override' => 6,
						'label' => 'Info',
						'html' => '<p>This homepage item requires <a href="https://github.com/henrywhitaker3/Speedtest-Tracker" target="_blank" rel="noreferrer noopener">Speedtest-Tracker</a> to be running on your network.</p>'
					),
					array(
						'type' => 'switch',
						'name' => 'homepageSpeedtestEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageSpeedtestEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageSpeedtestAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageSpeedtestAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'speedtestURL',
						'label' => 'URL',
						'value' => $GLOBALS['speedtestURL'],
						'help' => 'Enter the IP:PORT of your speedtest instance e.g. http(s)://<ip>:<port>'
					),
				),
				'Options' => array(
					array(
						'type' => 'input',
						'name' => 'speedtestHeader',
						'label' => 'Title',
						'value' => $GLOBALS['speedtestHeader'],
						'help' => 'Sets the title of this homepage module',
					),
					array(
						'type' => 'switch',
						'name' => 'speedtestHeaderToggle',
						'label' => 'Toggle Title',
						'value' => $GLOBALS['speedtestHeaderToggle'],
						'help' => 'Shows/hides the title of this homepage module'
					),
				),
			)
		),
		array(
			'name' => 'Netdata',
			'enabled' => true,
			'image' => 'plugins/images/tabs/netdata.png',
			'category' => 'Monitor',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageNetdataEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageNetdataEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageNetdataAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageNetdataAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'html',
						'override' => 12,
						'label' => 'Info',
						'html' => 'The URL needs to be on the same domain as your Organizr, and be proxied by subdomain. E.g. If Organizr is accessed at: https://domain.com, then your URL for netdata should be: https://netdata.domain.com'
					),
					array(
						'type' => 'input',
						'name' => 'netdataURL',
						'label' => 'URL',
						'value' => $GLOBALS['netdataURL'],
						'help' => 'Please enter the local IP:PORT of your netdata instance'
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
				),
				'Chart 1' => array(
					array(
						'type' => 'switch',
						'name' => 'netdata1Enabled',
						'label' => 'Enable',
						'value' => $GLOBALS['netdata1Enabled']
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
					array(
						'type' => 'input',
						'name' => 'netdata1Title',
						'label' => 'Title',
						'value' => $GLOBALS['netdata1Title'],
						'help' => 'Title for the netdata graph'
					),
					array(
						'type' => 'select',
						'name' => 'netdata1Data',
						'label' => 'Data',
						'value' => $GLOBALS['netdata1Data'],
						'options' => netdataOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata1Chart',
						'label' => 'Chart',
						'value' => $GLOBALS['netdata1Chart'],
						'options' => netdataChartOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata1Colour',
						'label' => 'Colour',
						'value' => $GLOBALS['netdata1Colour'],
						'options' => netdataColourOptions(),
					),
				),
				'Chart 2' => array(
					array(
						'type' => 'switch',
						'name' => 'netdata2Enabled',
						'label' => 'Enable',
						'value' => $GLOBALS['netdata2Enabled']
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
					array(
						'type' => 'input',
						'name' => 'netdata2Title',
						'label' => 'Title',
						'value' => $GLOBALS['netdata2Title'],
						'help' => 'Title for the netdata graph'
					),
					array(
						'type' => 'select',
						'name' => 'netdata2Data',
						'label' => 'Data',
						'value' => $GLOBALS['netdata2Data'],
						'options' => netdataOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata2Chart',
						'label' => 'Chart',
						'value' => $GLOBALS['netdata2Chart'],
						'options' => netdataChartOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata2Colour',
						'label' => 'Colour',
						'value' => $GLOBALS['netdata2Colour'],
						'options' => netdataColourOptions(),
					),
				),
				'Chart 3' => array(
					array(
						'type' => 'switch',
						'name' => 'netdata3Enabled',
						'label' => 'Enable',
						'value' => $GLOBALS['netdata3Enabled']
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
					array(
						'type' => 'input',
						'name' => 'netdata3Title',
						'label' => 'Title',
						'value' => $GLOBALS['netdata3Title'],
						'help' => 'Title for the netdata graph'
					),
					array(
						'type' => 'select',
						'name' => 'netdata3Data',
						'label' => 'Data',
						'value' => $GLOBALS['netdata3Data'],
						'options' => netdataOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata3Chart',
						'label' => 'Data',
						'value' => $GLOBALS['netdata3Chart'],
						'options' => netdataChartOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata3Colour',
						'label' => 'Colour',
						'value' => $GLOBALS['netdata3Colour'],
						'options' => netdataColourOptions(),
					),
				),
				'Chart 4' => array(
					array(
						'type' => 'switch',
						'name' => 'netdata4Enabled',
						'label' => 'Enable',
						'value' => $GLOBALS['netdata4Enabled']
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
					array(
						'type' => 'input',
						'name' => 'netdata4Title',
						'label' => 'Title',
						'value' => $GLOBALS['netdata4Title'],
						'help' => 'Title for the netdata graph'
					),
					array(
						'type' => 'select',
						'name' => 'netdata4Data',
						'label' => 'Data',
						'value' => $GLOBALS['netdata4Data'],
						'options' => netdataOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata4Chart',
						'label' => 'Chart',
						'value' => $GLOBALS['netdata4Chart'],
						'options' => netdataChartOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata4Colour',
						'label' => 'Colour',
						'value' => $GLOBALS['netdata4Colour'],
						'options' => netdataColourOptions(),
					),
				),
				'Chart 5' => array(
					array(
						'type' => 'switch',
						'name' => 'netdata5Enabled',
						'label' => 'Enable',
						'value' => $GLOBALS['netdata5Enabled']
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
					array(
						'type' => 'input',
						'name' => 'netdata5Title',
						'label' => 'Title',
						'value' => $GLOBALS['netdata5Title'],
						'help' => 'Title for the netdata graph'
					),
					array(
						'type' => 'select',
						'name' => 'netdata5Data',
						'label' => 'Data',
						'value' => $GLOBALS['netdata5Data'],
						'options' => netdataOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata5Chart',
						'label' => 'Chart',
						'value' => $GLOBALS['netdata5Chart'],
						'options' => netdataChartOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata5Colour',
						'label' => 'Colour',
						'value' => $GLOBALS['netdata5Colour'],
						'options' => netdataColourOptions(),
					),
				),
				'Chart 6' => array(
					array(
						'type' => 'switch',
						'name' => 'netdata6Enabled',
						'label' => 'Enable',
						'value' => $GLOBALS['netdata6Enabled']
					),
					array(
						'type' => 'blank',
						'label' => ''
					),
					array(
						'type' => 'input',
						'name' => 'netdata6Title',
						'label' => 'Title',
						'value' => $GLOBALS['netdata6Title'],
						'help' => 'Title for the netdata graph'
					),
					array(
						'type' => 'select',
						'name' => 'netdata6Data',
						'label' => 'Data',
						'value' => $GLOBALS['netdata6Data'],
						'options' => netdataOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata6Chart',
						'label' => 'Chart',
						'value' => $GLOBALS['netdata6Chart'],
						'options' => netdataChartOptions(),
					),
					array(
						'type' => 'select',
						'name' => 'netdata6Colour',
						'label' => 'Colour',
						'value' => $GLOBALS['netdata6Colour'],
						'options' => netdataColourOptions(),
					),
				),
				'Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageNetdataRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageNetdataRefresh'],
						'options' => optionTime()
					),
				),
			)
		),
	);
}

function buildHomepageSettings()
{
	$homepageOrder = homepageOrder();
	$homepageList = '<h4>Drag Homepage Items to Order Them</h4><div id="homepage-items-sort" class="external-events">';
	$inputList = '<form id="homepage-values" class="row">';
	foreach ($homepageOrder as $key => $val) {
		switch ($key) {
			case 'homepageOrdercustomhtml':
				$class = 'bg-info';
				$image = 'plugins/images/tabs/custom1.png';
				if (!$GLOBALS['homepagCustomHTMLoneEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdercustomhtmlTwo':
				$class = 'bg-info';
				$image = 'plugins/images/tabs/custom2.png';
				if (!$GLOBALS['homepagCustomHTMLtwoEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdertransmission':
				$class = 'bg-transmission';
				$image = 'plugins/images/tabs/transmission.png';
				if (!$GLOBALS['homepageTransmissionEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdernzbget':
				$class = 'bg-nzbget';
				$image = 'plugins/images/tabs/nzbget.png';
				if (!$GLOBALS['homepageNzbgetEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderjdownloader':
				$class = 'bg-sab';
				$image = 'plugins/images/tabs/jdownloader.png';
				if (!$GLOBALS['homepageJdownloaderEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdersabnzbd':
				$class = 'bg-sab';
				$image = 'plugins/images/tabs/sabnzbd.png';
				if (!$GLOBALS['homepageSabnzbdEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderdeluge':
				$class = 'bg-deluge';
				$image = 'plugins/images/tabs/deluge.png';
				if (!$GLOBALS['homepageDelugeEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderqBittorrent':
				$class = 'bg-qbit';
				$image = 'plugins/images/tabs/qBittorrent.png';
				if (!$GLOBALS['homepageqBittorrentEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderrTorrent':
				$class = 'bg-qbit';
				$image = 'plugins/images/tabs/rTorrent.png';
				if (!$GLOBALS['homepagerTorrentEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderplexnowplaying':
			case 'homepageOrderplexrecent':
			case 'homepageOrderplexplaylist':
				$class = 'bg-plex';
				$image = 'plugins/images/tabs/plex.png';
				if (!$GLOBALS['homepagePlexEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderembynowplaying':
			case 'homepageOrderembyrecent':
				$class = 'bg-emby';
				$image = 'plugins/images/tabs/emby.png';
				if (!$GLOBALS['homepageEmbyEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderombi':
				$class = 'bg-inverse';
				$image = 'plugins/images/tabs/ombi.png';
				if (!$GLOBALS['homepageOmbiEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdercalendar':
				$class = 'bg-primary';
				$image = 'plugins/images/tabs/calendar.png';
				if (!$GLOBALS['homepageSonarrEnabled'] && !$GLOBALS['homepageRadarrEnabled'] && !$GLOBALS['homepageSickrageEnabled'] && !$GLOBALS['homepageCouchpotatoEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderdownloader':
				$class = 'bg-inverse';
				$image = 'plugins/images/tabs/downloader.png';
				if (!$GLOBALS['jdownloaderCombine'] && !$GLOBALS['sabnzbdCombine'] && !$GLOBALS['nzbgetCombine'] && !$GLOBALS['rTorrentCombine'] && !$GLOBALS['delugeCombine'] && !$GLOBALS['transmissionCombine'] && !$GLOBALS['qBittorrentCombine']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderhealthchecks':
				$class = 'bg-healthchecks';
				$image = 'plugins/images/tabs/healthchecks.png';
				if (!$GLOBALS['homepageHealthChecksEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderunifi':
				$class = 'bg-info';
				$image = 'plugins/images/tabs/ubnt.png';
				if (!$GLOBALS['homepageUnifiEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdertautulli':
				$class = 'bg-info';
				$image = 'plugins/images/tabs/tautulli.png';
				if (!$GLOBALS['homepageTautulliEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderPihole':
				$class = 'bg-info';
				$image = 'plugins/images/tabs/pihole.png';
				if (!$GLOBALS['homepagePiholeEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderMonitorr':
				$class = 'bg-info';
				$image = 'plugins/images/tabs/monitorr.png';
				if (!$GLOBALS['homepageMonitorrEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderWeatherAndAir':
				$class = 'bg-success';
				$image = 'plugins/images/tabs/wind.png';
				if (!$GLOBALS['homepageWeatherAndAirEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderSpeedtest':
				$class = 'bg-success';
				$image = 'plugins/images/tabs/speedtest-icon.png';
				if (!$GLOBALS['homepageSpeedtestEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderNetdata':
				$class = 'bg-success';
				$image = 'plugins/images/tabs/netdata.png';
				if (!$GLOBALS['homepageNetdataEnabled']) {
					$class .= ' faded';
				}
				break;
			default:
				$class = 'blue-bg';
				$image = '';
				break;
		}
		$homepageList .= '
		<div class="col-md-3 col-xs-12 sort-homepage m-t-10 hvr-grow">
			<div class="homepage-drag fc-event ' . $class . ' lazyload"  data-src="' . $image . '">
				<span class="ordinal-position text-uppercase badge bg-org homepage-number" data-link="' . $key . '" style="float:left;width: 30px;">' . $val . '</span>
				<span class="homepage-text">&nbsp; ' . strtoupper(substr($key, 13)) . '</span>

			</div>
		</div>
		';
		$inputList .= '<input type="hidden" name="' . $key . '">';
	}
	$homepageList .= '</div>';
	$inputList .= '</form>';
	return $homepageList . $inputList;
}

function ombiTVDefault($type)
{
	switch ($type) {
		case 'all':
			return ($type == $GLOBALS['ombiTvDefault']) ? true : false;
		case 'first':
			return ($type == $GLOBALS['ombiTvDefault']) ? true : false;
		case 'last':
			return ($type == $GLOBALS['ombiTvDefault']) ? true : false;
		default:
			return false;
	}
	return false;
}