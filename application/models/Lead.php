<?php 
	class Lead extends CI_Model {

		/*DOCU Get leads data and pass to controller Owner: Philip */
		public function get_leads($offset,$limit) {
			$sql = "SELECT clients.client_id AS id,
					COUNT(leads_id) AS leads,
					clients.first_name AS first, clients.last_name AS last,
					clients.email, registered_datetime AS date
					FROM clients
					INNER JOIN sites
					ON clients.client_id = sites.client_id
					INNER JOIN leads
					ON leads.leads_id = sites.site_id
					GROUP BY clients.client_id
					LIMIT ?,?";
			$query = $this->db->query($sql,array(intval($offset),$limit));
			$data = $query->result();
			if(!empty($data)) {
				return $data;
			}
			else {
				return $data["error"] = "No records found!";
			}
		}

		/*DOCU This function returns the total number of records retrieve based on the below query
		Owner:Philip*/
		public function count() {
			$sql = "SELECT clients.client_id AS id,
					COUNT(leads_id) AS leads,
					clients.first_name AS first, clients.last_name AS last,
					clients.email, registered_datetime AS date
					FROM clients
					INNER JOIN sites
					ON clients.client_id = sites.client_id
					INNER JOIN leads
					ON leads.leads_id = sites.site_id
					GROUP BY clients.client_id";
			$query = $this->db->query($sql);
			return $query->num_rows();
		}

		/*DOCU Get leads based on search term Owner: Philip */
		public function search_leads($search) {
			$sql = "SELECT clients.client_id AS id,
					clients.first_name AS first, clients.last_name AS last,
					clients.email, registered_datetime AS date
					FROM clients
					INNER JOIN sites
					ON clients.client_id = sites.client_id
					INNER JOIN leads
					ON leads.leads_id = sites.site_id
					WHERE clients.first_name LIKE ?
					GROUP BY clients.client_id";
			$query = $this->db->query($sql,array("%".$search."%"));
			$data = array(
				"leads" => $query->result(),
				"count" => $query->num_rows()
			);
			return $data;
		}

		/*DOCU Get leads based on search term Owner: Philip */
		public function count_search($search) {
			$sql = "SELECT leads_id AS id,
					clients.first_name AS first, clients.last_name AS last,
					clients.email, registered_datetime AS date
					FROM clients
					INNER JOIN sites
					ON clients.client_id = sites.client_id
					INNER JOIN leads
					ON leads.leads_id = sites.site_id
					WHERE clients.first_name LIKE ?";
			$query = $this->db->query($sql,array("%".$search."%"));
			return $query->num_rows();
		}

	}
?>