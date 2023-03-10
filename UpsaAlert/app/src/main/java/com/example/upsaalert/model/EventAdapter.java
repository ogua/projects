package com.example.upsaalert.model;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.Snackbar;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.example.upsaalert.EventsActivity;
import com.example.upsaalert.R;
import com.squareup.picasso.Picasso;

import java.util.List;

public class EventAdapter extends RecyclerView.Adapter<EventAdapter.ViewHolder> {
private List<Events> listItems;
private Context context;

public EventAdapter(List<Events> listItems, Context context) {
        this.listItems = listItems;
        this.context = context;
        }
@NonNull
@Override
public EventAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(viewGroup.getContext())
        .inflate(R.layout.eventitem, viewGroup, false);
        return new ViewHolder(v);
        }

@Override
public void onBindViewHolder(@NonNull final EventAdapter.ViewHolder viewHolder, int position) {
final Events listItem = listItems.get(position);
        viewHolder.eventtitle.setText(listItem.getTitle());
        //viewHolder.startdatentimend.setText(listItem.getDatefrm());
       // viewHolder.location.setText(listItem.getLocation());
        //viewHolder.call.setText(listItem.getContact());
       // viewHolder.cohosta.setText(listItem.getCohost());

    RequestOptions requestOptions = new RequestOptions()
            .placeholder(R.drawable.ic_launcher_background);

        Glide.with(context)
        .load(listItem.getImage())
                .apply(requestOptions)
        .into(viewHolder.prdtimg);

        viewHolder.cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, EventsActivity.class);
                intent.putExtra("eventid",listItem.getEventid());
                intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                context.startActivity(intent);
            }
        });
        }

@Override
public int getItemCount() {
        return listItems.size();
        }

public class ViewHolder extends RecyclerView.ViewHolder{
    public TextView eventtitle;
    public TextView startdatentimend;
    public TextView enddate;
    public TextView starttime;
    public TextView endtime;
    public TextView location;
    public TextView call;
    public TextView cohosta;
    public ImageView prdtimg;
    public RelativeLayout cardView;



    public ViewHolder(View itemView) {
        super(itemView);

        eventtitle = (TextView) itemView.findViewById(R.id.eventt);
       // startdatentimend = (TextView) itemView.findViewById(R.id.datetimestend);
        //location = (TextView) itemView.findViewById(R.id.locatn);
        ///call = (TextView) itemView.findViewById(R.id.callx);
        //cohosta = (TextView) itemView.findViewById(R.id.hosttd);
        prdtimg = (ImageView) itemView.findViewById(R.id.eventimg);
        cardView = (RelativeLayout) itemView.findViewById(R.id.viewit);
    }
}
}
