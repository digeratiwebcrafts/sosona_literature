<?php
class functions extends Db

{
		public function consigneeLists($entryType='' ,$paginate = "N")
		{
		    $sql = "SELECT * FROM `consignee` ";
		    
		    if(!empty($entryType))
		    {
				$sql .= " WHERE `entry_type` = '".$entryType."' ";
			}
			else
			{
				$sql .= " WHERE `entry_type` = 'Area' OR `entry_type` = 'Group' ";
				
			}
		    
		    $sql .= " ORDER BY `entry_type`";
		  
		    $result = $this->execute_query($sql);
		    $consigneeLists = array();
		    if ($this->get_num_rows($result) > 0)
		    {
		        if ($paginate == "N")
		        {
		            while ($row = $this->fetch_data($result))
		            {
		                $consigneeLists[] = $row;
		            }
		        }
		        else
		        {
		            global $num_rows, $p, $start, $list, $other_params, $num, $page;
		            $list = ROW_PER_PAGE;
		            $num_rows = $this->get_num_rows($result);
		            $p = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 1;
		            $num = ceil($num_rows / $list);
		            $page = CUR_PAGE_NAME;
		            $start = $list * ($p - 1);
		            $i = 0;
		            while ($row = $this->fetch_data($result))
		            {
		                if ($i >= $start && $i < ($start + $list))
		                {
		                    $consigneeLists[] = $row;
		                }
		                $i++;
		            }
		        }
		        return $consigneeLists;
		    }
		    else
		    {
		        return 0;
		    }
		}

		public function consigneeOrderLists($consignee_id ,$paginate = "N")
		{
		    $sql = "SELECT * FROM `order_new` WHERE consignee_id = '".$consignee_id."' ";		    
		    $result = $this->execute_query($sql);
		    $consigneeLists = array();
		    if ($this->get_num_rows($result) > 0)
		    {
		        if ($paginate == "N")
		        {
		            while ($row = $this->fetch_data($result))
		            {
		                $consigneeLists[] = $row;
		            }
		        }
		        else
		        {
		            global $num_rows, $p, $start, $list, $other_params, $num, $page;
		            $list = ROW_PER_PAGE;
		            $num_rows = $this->get_num_rows($result);
		            $p = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 1;
		            $num = ceil($num_rows / $list);
		            $page = CUR_PAGE_NAME;
		            $start = $list * ($p - 1);
		            $i = 0;
		            while ($row = $this->fetch_data($result))
		            {
		                if ($i >= $start && $i < ($start + $list))
		                {
		                    $consigneeLists[] = $row;
		                }
		                $i++;
		            }
		        }
		        return $consigneeLists;
		    }
		    else
		    {
		        return 0;
		    }
		}

		public function consigneePaymentLists($consignee_id ,$paginate = "N")
		{
		    $sql = "SELECT * FROM `payment` WHERE payment_by = '".$consignee_id."' ";		    
		    $result = $this->execute_query($sql);
		    $consigneeLists = array();
		    if ($this->get_num_rows($result) > 0)
		    {
		        if ($paginate == "N")
		        {
		            while ($row = $this->fetch_data($result))
		            {
		                $consigneeLists[] = $row;
		            }
		        }
		        else
		        {
		            global $num_rows, $p, $start, $list, $other_params, $num, $page;
		            $list = ROW_PER_PAGE;
		            $num_rows = $this->get_num_rows($result);
		            $p = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 1;
		            $num = ceil($num_rows / $list);
		            $page = CUR_PAGE_NAME;
		            $start = $list * ($p - 1);
		            $i = 0;
		            while ($row = $this->fetch_data($result))
		            {
		                if ($i >= $start && $i < ($start + $list))
		                {
		                    $consigneeLists[] = $row;
		                }
		                $i++;
		            }
		        }
		        return $consigneeLists;
		    }
		    else
		    {
		        return 0;
		    }
		}

			/*///Dummy Listing  Function Example With Sigle Result
			public function functionName($params, $params)
			{
				$sql = "Your Query";
				$con = $this->con;
				$result = $con->query($sql);
				if ($result->num_rows > 0)
					{
						$rslt = $result->fetch_array(MYSQLI_ASSOC);
			            return $rslt;
			        }
			        else
			        {
			            return "0";
			        }
			}
			///Dummy Insert data  Function Example With Sigle Result
			public function add_Sector($params,$params,$params)
			    {
			        $sql = "Insert Query
							";

			        return $this->execute_query($sql);
			    }
			///Dummy Update data  Function Example With Sigle Result		
			public function update_Sector($params,$params,$params,$params)
			    {
			        $sql = "UPDATE Query
							";

			        return $this->execute_query($sql);
			    }*/
}

?>