2.12
SwingFish Helper (GlobalTP+)

SwingFish Helper by Mario Hennenberger

Auto Hedges Positions based on first position distance and/or overall Position Loss
terminates ALL open Positions and delete ALL Pending Orders if Net Profit or Equity Target or max loss is reached

License:
    Creative Common "CC BY" - you are REQUIRED to mention me or swingfish.trade if you re-publish this.

Contributions:
    - Mario Hennenberger <swingfish@icloud.com> https://www.swingfish.trade
    - tmc. <belochjiri@hotmail.com> https://ctdn.com/users/profile/tmc_

get Updates:
    - https://swingfish.trade/swingfish-helper
    - https://ctdn.com/algos/cbots/show/1664 (no more updates here, sorry)

ToDo:
    - some times auto hedging happens always regardless of the equity  /// this is maybe fixed already with the double call removed

Beta changes (in progress)
 - allow re-hedging on existing positions
 - re enable local protection 
 - using internal folders 

Changes:
    - fixed "reconnect-hedge-bug" bot will not hedge if it is unaware of the current positions.
    - MarginCall ALWAYS triggers (even if hedging is turned off or no targets are set!
    - remove of chart-symbol (always hedging globally)
    - new Loss calculation includes Comissions and swaps
    - use of pathfunctions to "find" logs and sounds
    - if DayStart balance is set to 0
      automatically get the start balance of the day
    - HOTFIX (2.02) respect max order size,
                    to prevent failed placements on maximum size
    - sound setting ignores hedge sound
    - change installer version (2.01)
    - use Windows installer for sound files (no code change)
    - default loss at 0.5%
    - remove System.AttributeTargets.Class
    - remove "Current Capital" setting (temporary)
    - re arrange and rename of settings, no functional change (1.71)
    - remove FullAccess (just requires Internet Access)
    - sounds from archive folder in /Sounds/
    - use order sounds (1.7)
    - temporary use a flexible IP for update check
    - ssl fix (1.61)
    - fix for netting accounts (1.6.1)
    - remove TP and SL from hedged positions
    - change colors to reflect the Daystart (not the current trade)
    - add version check (beta)
    - play sounds from Documents Directory ('swingfish-helper-hedge.mp3')
    - add notification sound (hardcoded path)
    - hedge active by default
    - 2 digit target
    - remove (hedge globally setting (always hedging globally)
    - add Capital Field for GLobals Profit/loss calculatios
    - display cents (*10)
    - stop not "stop" the bot but disables tp feature
    - added daytrader balance
    - remove Hedge Distance (pointless)
    - remove Dummy variables for time (all in secounds now)
    - show hours if more then 3600 sec to wait
    - fix Spacin in display text
    - time stops based on timezone
    - remove double check in batch
    - protection fix
    - remove duplicated outputs
    - in Protect Profit mode .. always use timer mode (fast)
    - re-enable time stops with proper date functions
    - negative stop (equity stop if over equity already) (1.51)
    - disable cash target - if TP is set .. it will be converted to Equity target
    - 2 line status 1 TP 1 Hedge
    - show minutes to Close if more than 120 secounds till close
    - scalp switch (use 100ms timer)
    - kill after Execute Switch
    - Global Chartobjects
    - bug fixed if 0 pip position hedge is selected only
    - 3 digit Equity calculation
    - use percentage instead of absolute hedge value (Hedge Loss / Hedge Max Loss)
    - comment if only hedge
    - replace Hedge Global with Hedge ALL
    - export Hedge and GlobalTP to functions
    - fix global position hedge
    - include hedge bot (1.01)
    - starting version 0.3 name is changed to "SwingFish Helper" (previous "GlobalTP+", last version 0.23.2)
    - async close for faster execution
    - use 100 ms Timer to make it more responsive
    - remove cents display
    - better text and display equity percentage
    - reset equity OnTick
    - bug in calculating the total equity
    - use net instead of Gross
    - convert api names to new version