0.22
LaMetric Time Integration for cTrader

allows the cTrader to show Account & Position informations on the LaMetric Time

License:
 - Creative Common "CC BY" - you are REQUIRED to mention me or swingfish.trade if you re-publish this.

Contributions:
 - Mario Hennenberger  https://www.swingfish.trade
 - Jiri Beloch https://www.poshtrader.com

get Updates:
 - https://swingfish.trade/lametric2ctrader

ToDo:
 - send a actual Notification on Margin cross
 - position Notification ?
   (requires Notification API .. may be a Auth issue)
 - OnStop needs to wait a bit to complete the last transmission ..
   bot quits too fast last update of the clock does not work
 - better app integration (getting auth to work can be "tricky" for some peoples)

Changes:
 - actually use the timer (not OnTick)
 - minor fixes)
 - choice to calculate TodaysPnL based on Balance or Equity
 - Better communication
 - fixed icon issue
 - added margin warning level (shows a different icon when level is crossed)
 - only shows "today" when no position is open
    
P.S. there is also a MT5 Version available
