SwingFish Helper (GlobalTP+)

closes all position once a target is reached!

TP Part closes ALL Trades and Deletes All Orders once the equity or relative Profit is reached

TP Active:		ON/OFF Switch for Take Profit Functions
			TP Active does NOT Deactivate Margin Call or Hedge Settings !!
TP Profit:		Amount all trades combined have to be in profit to close all trades
TP Equity:		Equity to reach to terminate all trades and delete all orders
Margin Call:		Equity to close all orders (must be smaller than balance)

Hedge places Hedge Orders to Protect Account
Hedge Distance:		Distance in Pips to Hedge (this works only at the first trade !)
			once more than 1 Trade is open in the same Product, this setting will be ignored
Hedge Max Loss (%):	once all positions in the same Product have a combined loss of XX percent based on the account balance .. hedges will be placed
			WARNING: opening new positions afer the Hedge Loss value is smaller than the loss.. the Algo will Immidealty place another hedge to cover !!
Hedge All:		if Active, ALL Products will be hedged / if Inactive only the Current Product will be hedged


Changes:
    - update cache directory
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
