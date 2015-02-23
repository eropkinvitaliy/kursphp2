<?php

abstract class Article
{
    abstract protected function CreateRecord($RecTitle, $RecPreview, $RecText, $RecTags);

    abstract protected function GetAllRecords();

    abstract protected function GetRecordById($RecId);

    abstract protected function UpdateRecord($RecId, $ParamsArr);
}