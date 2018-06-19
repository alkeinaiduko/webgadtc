<template>

  <div id="announcements-list-container">
    <modal v-if="showModal" @close="showModal = false" :anntitle="eachAnnouncement.title" :anndesc="eachAnnouncement.description" :annimagesrc="image_src" @descChanged="edited.description = $event, successMessage()" @titleChanged="edited.title = $event, updateAnn(eachAnnouncement.id)">
    </modal>

    <success-modal v-if="showMessageModal" @close="showMessageModal = false">

      <!--
        you can use custom content here to overwrite
        default content
      -->
      <!-- <input slot="header" class="uk-input" :value="eachAnnouncement.title"></input> -->

      <!-- <textarea class="uk-textarea" name="description" slot="body" :value="eachAnnouncement.description"></textarea> -->
      <div slot="body">
        <div class="success-icon text-center"></div>
        <h1>Successfully Edited</h1>
      </div>

      <div slot="footer" style="margin: 0 auto;">
        <button class="btn btn-success" @click="showMessageModal = false">Okay</button>
      </div>
    </success-modal>

    <confirm-modal v-if="showConfirmModal" @close="showConfirmModal = false">

      <!--
        you can use custom content here to overwrite
        default content
      -->
      <!-- <input slot="header" class="uk-input" :value="eachAnnouncement.title"></input> -->

      <!-- <textarea class="uk-textarea" name="description" slot="body" :value="eachAnnouncement.description"></textarea> -->
      <div slot="body">
        <h4>Are you sure you want to delete this announcement?</h4>
      </div>

      <div slot="footer" style="margin: 0 auto;">
        <button class="btn btn-danger" @click="deleteSelected(eachAnnouncement.id)">Delete</button>
        <button class="btn btn-default" @click="showConfirmModal = false">Cancel</button>
      </div>
    </confirm-modal>

    <div class="announcements-list-content">
      <ul>
        <li class="announcements-list-left-panel">
          <div class="all-announcement-container">
            <div class="each-announcement-container" v-for="announcement in announcements" @click="selectOne(announcement)">
              <div class="announcement-title">
                {{announcement.title}}
              </div>
              <hr>
              <div class="announcement-description">
                <p>{{(announcement.description).substring(0, 250)}}<span v-if="announcement.description.length > 250">...</span></p>

              </div>
            </div>

            <div class="each-announcement-container" v-if="announcements.length === 0">
              No Announcement Created Yet!
            </div>

          </div>
        </li>

        <li class="announcements-list-right-panel">
          <div class="announcement-detail-container">
            <div class="detail-heading">
              <h4 class="detail-title">Announcement Details</h4>
            </div>
            <div class="detail-body">
              <p><strong>Title:</strong> {{eachAnnouncement.title}}</p>
              <p><strong>Created On:</strong> {{eachAnnouncement.created_at}}</p>
              <p><strong>Updated On:</strong> {{eachAnnouncement.updated_at}}</p>
              <p><strong>Posted by:</strong> ADMIN</p>
              <p><strong>Announcement Cover:</strong></p>
              <img width="150px" :src="image_src">
            </div>
            <hr>
            <div class="detail-footer">
              <div class="announcement-button-container">
                <button class="btn btn-success" @click="showModal = true">Edit</button>
                <button class="btn btn-danger" @click="confirmDelete()">Delete</button>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script type="text/javascript">
    export default {
      data() {
        return {
          announcements: [],
          eachAnnouncement: {
            id: 'No Selected ID',
            title: 'No Selected Title',
            description: 'No Selected Description',
            announcement_image: 'No Selected Description',
            created_at: 'No Selected Created On',
            updated_at: 'No Selected Updated On'
          },
          monthToString: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          showModal: false,
          showMessageModal: false,
          showConfirmModal: false,
          edited: {
            title: '',
            description: ''
          },
          image_src: ''
        }
      },
      created() {
        this.getAnnouncement();
      },
      methods: {
        getAnnouncement() {
          axios.get('/admin/get-announcements')
            .then((response) => {
            this.announcements = response.data;
            this.populateAnnouncementDetails();
          });
        },
        selectOne(announcement) {

          let createdDate = new Date(announcement.created_at);
          let createdTimeToString = createdDate.toLocaleString('en-US', { hour: 'numeric', hour12: true , minute: 'numeric'});
          let created_at = this.monthToString[createdDate.getMonth()+1] + ' ' + createdDate.getDate() + ', ' + createdDate.getFullYear() + ' at ' + createdTimeToString;



          let updatedDate = new Date(announcement.updated_at);
          let updatedTimeToString = updatedDate.toLocaleString('en-US', { hour: 'numeric', hour12: true , minute: 'numeric'});

          let updated_at = this.monthToString[updatedDate.getMonth()+1] + ' ' + updatedDate.getDate() + ', ' + updatedDate.getFullYear() + ' at ' + updatedTimeToString;


          this.eachAnnouncement.id = announcement.id;
          this.eachAnnouncement.title = announcement.title;
          this.eachAnnouncement.description = announcement.description;
          this.image_src = '/storage/announcement_images/' + announcement.announcement_image;
          this.eachAnnouncement.created_at = created_at;
          this.eachAnnouncement.updated_at = updated_at;
          
        },
        confirmDelete() {
          this.showConfirmModal = true;
        },
        deleteSelected(id) {
          axios.delete('/admin/delete-announcement/'+id)
              .then((response) => {
                this.getAnnouncement();
                  this.showConfirmModal = false;

                  this.populateAnnouncementDetails();
              })
              .catch((e) => {
                console.log(e);
              });
        },
        populateAnnouncementDetails() {
          let createdDate = new Date(this.announcements[0].created_at);
          let createdTimeToString = createdDate.toLocaleString('en-US', { hour: 'numeric', hour12: true , minute: 'numeric'});
          let created_at = this.monthToString[createdDate.getMonth()+1] + ' ' + createdDate.getDate() + ', ' + createdDate.getFullYear() + ' at ' + createdTimeToString;

          let updatedDate = new Date(this.announcements[0].updated_at);
          let timeToString = updatedDate.toLocaleString('en-US', { hour: 'numeric', hour12: true , minute: 'numeric'});

          let updated_at = this.monthToString[updatedDate.getMonth()+1] + ' ' + updatedDate.getDate() + ', ' + updatedDate.getFullYear() + ' at ' + timeToString;

          this.eachAnnouncement.id = this.announcements[0].id;
          this.eachAnnouncement.title = this.announcements[0].title;
          this.eachAnnouncement.description = this.announcements[0].description;
          this.image_src = '/storage/announcement_images/' + this.announcements[0].announcement_image;
          this.eachAnnouncement.created_at = created_at;
          this.eachAnnouncement.updated_at = updated_at;
        },
        updateAnn(id) {          
          if(this.edited.title == '') {
            this.edited.title = this.eachAnnouncement.title;
          }

          if(this.edited.description == '') {
            this.edited.description = this.eachAnnouncement.description;
          }

          axios.put(`/admin/edit/${id}`, this.edited)
              .then((response) => {
                this.getAnnouncement();
              });

        },
        successMessage() {
          this.showMessageModal = true;
        }
      }
    }
    
</script>
