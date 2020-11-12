<h3 class="swingfish">SwingFish Downloads</h3>
<?
require_once(URI.'lib/3rd/discord/link/permission-functions.php');
$_SESSION['discord']['return'] = "/members/downloads";
if (checkDiscordPermissionHtml('member')){
?>
<pre><strong>WARNING!!</strong>
This is Copyrighted material
DO NOT DISTRIBUTE THIS LINKS CODE OR FILES ON ANY WEBSITES, EMAILS FRIENDS or ENEMIES !!
this is intended to be for SwingFish Members only!

just because it's free, does not imply that you can do whatever you want with it!

all items are provided "as is" without any warranty.

the code, ideas and execution is copyright of EnFoid Pte. Ltd. or provided with permission.
EnFoid will not hesitate to take legal actions, if this simple rules are not respected!</pre>    
	<div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Type</th>
              <th>Version</th>
              <th>Links</th>
              <th>Note</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a target="_top" href="/swingfish-intra">SwingFish Intra</a></td>
              <td>cTrader Indicator</td>
              <td><?php echo get_AppVersion('swingfish-intra'); ?></td>
              <td><a target="_blank" href="https://drive.google.com/open?id=16snQO4EZRz8mZWRIsDE8emLoRvssQyTT">Download (.algo)</a></td>
              <td></td>
            </tr>
            <tr>
              <td><a target="_top" href="/vwap-forex">Forex vWap</a></td>
              <td>cTrader Indicator</td>
              <td><?php echo get_AppVersion('swingfish-vwap-nodev'); ?></td>
              <td><a target="_blank" href="https://drive.google.com/open?id=1YFBivYaRMZJ-yW_JdXHcrdgLeukNrgZg">Download (.algo)</a></td>
              <td></td>
            </tr>
            <tr>
              <td><a target="_top" href="/vwap-forex">Forex vWap alert</a></td>
              <td>cTrader Indicator</td>
              <td>0.0</td>
              <td><a target="_blank" href="https://drive.google.com/open?id=1X-QVawNQ-halUPDoUZ2DZ2lWEjrlDF4K">Download (.algo)</a></td>
              <td></td>
            </tr>
            <tr>
              <td><a target="_top" href="/swingfish-helper">SwingFish Helper</a></td>
              <td>cTrader Algo +Sounds</td>
              <td><?php echo get_AppVersion('swingfish-helper'); ?></td>
              <td><a target="_blank" href="https://drive.google.com/file/d/1V7pmd-rAkE824EOkZ6HFs1zxIZ4vLKJ5/view">Download (.exe)</a></td>
              <td>(for first install)</td>
            </tr>
            <tr>
              <td><a target="_top" href="/swingfish-helper">SwingFish Helper</a></td>
              <td>cTrader Algo</td>
              <td><?php echo get_AppVersion('swingfish-helper'); ?></td>
              <td><a target="_blank" href="https://drive.google.com/file/d/16s89aYWuLfPNNuYwQgd740TgImrBl7PW/view">Download (.algo)</a></td>
              <td>(use to update only!)</td>
            </tr>
            <tr>
              <td><a target="_top" href="/vwap-meeseeks">VWAP Meeseeks</a></td>
              <td>cTrader Algo</td>
              <td><?php echo get_AppVersion('vwap-meeseeks'); ?></td>
              <td><a target="_blank" href="https://drive.google.com/file/d/10T8nlvhZxNfrcaxtvGvDet6T1ba_CNuf/view">Download (.algo)</a></td>
              <td></td>
            </tr>
            <tr>
              <td><a target="_top" href="/vwap-meeseeks">VWAP Meeseeks 2</a></td>
              <td>cTrader Algo</td>
              <td><?php echo get_AppVersion('vwap-meeseeks'); ?></td>
              <td><a target="_blank" href="<?=(checkDiscordPermissionHtml('mate') ? 'https://drive.google.com/file/d/1sFCrWcBdpveMe1soBS2lskyUmIcuDit2/view?usp=sharing' : '#')?>">Download (.algo)</a></td>
              <td><? if (checkDiscordPermissionHtml('mate')){ ?><font color="red"><strong>First-Mates only!!</strong></font><? } ?></td>
            </tr>
            <tr>
              <td><a target="_top" href="/stop-syncer">Stop Syncer 2</a></td>
              <td>cTrader Algo</td>
              <td><?php echo get_AppVersion('stop-syncer'); ?></td>
              <td><a target="_blank" href="https://drive.google.com/file/d/1LFWt3s81QT4G-XhbOFC0cRGNd5kfeOh6/view">Download (.algo)</a></td>
              <td></td>
            </tr>
            <tr>
              <td><a target="_top" href="/stop-syncer">Stop Syncer</a></td>
              <td>cTrader Script</td>
              <td>0.14</td>
              <td><a target="_blank" href="https://drive.google.com/open?id=1TuQmg1NVQ2ZQwswgkl4lgzdAOxE_njyr">Download (.algo)</a></td>
              <td></td>
            </tr>
            <tr>
              <td><a target="_top" href="/tl-trader">Trendline Trader</a></td>
              <td>cTrader Algo</td>
              <td><?php echo get_AppVersion('tl-trader'); ?></td>
              <td><a target="_blank" href="https://drive.google.com/open?id=102OLnImtowLNFzvHswRUOf8MXBamFVN6">Download (.algo)</a></td>
              <td></td>
            </tr>
            <tr>
              <td><a target="_top" href="/streamdeck-ctrader">StreamDeck Integration</a></td>
              <td>cTrader Algo +Server</td>
              <td><?php echo get_AppVersion('streamdeck'); ?></td>
              <td><a target="_blank" href="<?=(checkDiscordPermissionHtml('mate') ? 'https://drive.google.com/open?id=1KBViCOX_LqryiOjHYBnbEqREVTtlieZA' : '#')?>">Algo</a> | <a target="_blank" href="<?=(checkDiscordPermissionHtml('mate') ? 'https://drive.google.com/open?id=1c-zYngrpUvLLqwyee887yqFHpnIHTCpE' : '#')?>">Server (.exe)</a></td>
              <td><? if (checkDiscordPermissionHtml('mate')){ ?><font color="red"><strong>First-Mates only!!</strong></font><? } ?></td>
            </tr>
          </tbody>
        </table>
      </div>
<? } else {?>
<p>Please Authenticate with your Discord to access the Downloads</p>
<? } ?>