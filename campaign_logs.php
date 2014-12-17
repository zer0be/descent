<?php

// FIX ME: Move this part to a seperate file so we can import the correct 'flow' for each campaign (this one only works for Shadow Rune for example)
  // keep track of where we are in the campaign
  if ($row_rsQuestData['quest_act'] == "Act 1" && $row_rsQuestData['progress_quest_type'] == "Quest"){
    $questsAct1 += 1;
  } else if ($row_rsQuestData['quest_act'] == "Interlude" && $row_rsQuestData['progress_quest_type'] == "Quest"){
    $interludeDone = 1; 
  } else if ($row_rsQuestData['quest_act'] == "Act 2" && $row_rsQuestData['progress_quest_type'] == "Quest"){
    $questsAct2 += 1; 
  }

  // filter out act II quests that can/can't be selected because heroes won
  if ($row_rsQuestData['progress_quest_winner'] == "Heroes Win" && $row_rsQuestData['quest_next_h_id'] != NULL){
    $canChoose[] = $row_rsQuestData['quest_next_h_id'];
    $cantChoose[] = $row_rsQuestData['quest_next_ol_id'];
  }

  if ($row_rsQuestData['progress_quest_winner'] == "Heroes Win" && $row_rsQuestData['quest_act'] == "Act 1"){
    $wonForInterlude += 1;
  }

  if ($row_rsQuestData['progress_quest_winner'] == "Heroes Win" && $row_rsQuestData['quest_act'] == "Act 2"){
    $wonForFinale += 1;
  }


?>