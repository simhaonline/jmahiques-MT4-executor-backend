<?php

namespace App\Communication;

final class RequestParams
{
    public const INSTRUMENT = 'I';
    public const ASK = 'A';
    public const BID = 'B';
    public const DIGITS = 'D';
    public const MAGIC_NUMBER = 'MM';
    public const TICKET = 'T';
    public const OPEN_PRICE = 'OP';
    public const ORDER_TYPE = 'OT';
    public const OPEN_TIME = 'OOT';
    public const LOTS = 'L';
    //Not price levels, pip configuration
    public const STOP = 'S';
    public const PARTIAL_STOP = 'PS';
    public const PROFIT = 'P';
    public const PARTIAL_PROFIT = 'PP';
}
